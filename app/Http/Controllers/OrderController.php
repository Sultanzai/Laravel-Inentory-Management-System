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

        $orders = OrderView::orderBy('O_Date', 'desc')->get();
        return view('Order-page', compact('orders'));

    }


    public function create()
    {
        $customers = Customers::all();
        $products = ProductOrderDetailView::all(); 

        return view('Add-Order', compact('customers','products'));
    }

    public function show($id)
    {
        $order = OrderView::findOrFail($id);
        return view('Print-order', compact('order'));
    }
    


    public function store(Request $request)
    {
        $request->validate([
            'Customer_ID' => 'required|exists:tbl_customer,id',
            'products' => 'required|array',
            'products.*' => 'exists:tbl_product,id',
            'prices' => 'required|array',
            'prices.*' => 'numeric|min:0',
            'units' => 'required|array',
            'units.*' => 'numeric|min:0'
        ]);

        $order = Order::create([
            'Customer_ID' => $request->Customer_ID,
            'description' => $request->description
        ]);

        foreach ($request->products as $productID) {
            $order->products()->attach($productID, [
                'O_Price' => $request->prices[$productID],
                'O_unit' => $request->units[$productID]
            ]);
        }
        // Saving Balance in customer Column
        $customer = Customers::find($request->Customer_ID);
        $customer->Balance += $request->totalPrice;
        $customer->save();

        $orderID = $order->id;

        // Saving Order ID, Custoemr ID, And total Price in Payment Table 
        Payment::create([
            'P_Amount' => $request->totalPrice,
            'Order_ID' => $orderID,
            'Customer_ID' => $request->Customer_ID,
            'P_Type' => 'N/A',
            'P_Status' => 'UnPaid',
        ]);


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
            'prices.*' => 'numeric|min:0',
            'units' => 'required|array',
            'units.*' => 'numeric|min:0'
        ]);

        // Find the payment record and update it
        $updateorder = Order::findOrFail($id);
        $updateorder->update($validatedData);

        return redirect('/order')->with('success', 'Customer updated successfully');
    }
}
