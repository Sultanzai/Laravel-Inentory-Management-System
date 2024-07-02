<?php

namespace App\Http\Controllers;

use App\Models\OrderView;
use App\Models\Payment;
use App\Models\ProductOrderDetailView;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\Product;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;



class OrderController extends Controller
{

    public function index(){

        $orders = OrderView::orderBy('Order_ID', 'desc')->get();
        return view('Order-page', compact('orders'));

    }
    // Funtion to pass print data 
    public function printOrder($id)
    {
        $order = OrderView::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        return view('Print-order', compact('order'));
    }

    public function create()
    {
        $customers = Customers::all();
        $products = ProductOrderDetailView::all(); 

        return view('Add-Order', compact('customers','products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'Customer_ID' => 'required|exists:tbl_customer,id',
            'products' => 'required|array',
            'products.*' => 'exists:tbl_product,id',
            'prices' => 'required|array',
            'prices.*' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,4})?$/',
                'min:0'
            ],
            'units' => 'required|array',
            'units.*' => 'numeric|min:0'
        ]);

        $order = Order::create([
            'Customer_ID' => $request->Customer_ID,
            'O_Description' => $request->description
        ]);


        foreach ($request->products as $productID) {
            // Round prices and units to 2 decimal places
            $roundedPrice = round($request->prices[$productID], 2);
            $roundedUnit = round($request->units[$productID], 2);
        
            // Format prices and units to 2 decimal places
            $formattedPrice = number_format($roundedPrice, 2, '.', '');
            $formattedUnit = number_format($roundedUnit, 2, '.', '');
        
            $order->products()->attach($productID, [
                'O_Price' => $formattedPrice,
                'O_unit' => $formattedUnit
            ]);
        }
        // Saving Balance in customer Column
        $customer = Customers::find($request->Customer_ID);
        $customer->Balance += $request->totalPrice;
        $customer->save();
        
        if (!$order) {
            throw new \Exception('Order creation failed');
        }

        $payment = Payment::create([
            'Order_ID' => $order->id,
            'P_Remining' => $request->totalPrice,
            'P_Amount' => 0,
            'P_Type' => 'N/A',
            'P_Status' => 'Unpaid',
            'Customer_ID' => $request->Customer_ID,
        ]);
        
        if (!$payment) {
            throw new \Exception('Payment creation failed');
        }


        return redirect('/order')->with('success','');
    }

    
    public function edit($id)
    {
        $orderupdate = Order::findOrFail($id);

        return view('orderupdate', compact('orderupdate'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Customer_ID' => 'required|exists:tbl_customer,id',
            'products' => 'required|array',
            'products.*' => 'exists:tbl_product,id',
            'prices' => 'required|array',
            'prices.*' => 'float|min:0',
            'units' => 'required|array',
            'units.*' => 'numeric|min:0'
        ]);

        // Find the payment record and update it
        $updateorder = Order::findOrFail($id);
        $updateorder->update($validatedData);

        return redirect('/order')->with('success', 'Customer updated successfully');
    }
    
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('/order')->with('success', 'Order Deleted successfully');
    }

}
