<?php

namespace App\Http\Controllers;

use App\Models\OrderView;
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
        $products = Product::all(); 

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

        $customer = Customers::find($request->Customer_ID);
        $customer->Balance += $request->totalPrice;
        $customer->save();

        return redirect('/order')->with('success','');
    }
}
