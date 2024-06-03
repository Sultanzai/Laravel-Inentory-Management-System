<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\Product;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

class OrderController extends Controller
{
    // public function store(Request $request){
    //     $validateData = $request->validate([
    //         'O_Description'=>'required|string|max:255',
    //         'O_Total'=>'required',
    //         'O_Date'=>'required|',
    //     ]);
    //     $order = Order::create($validateData);
        
    // }
    public function index(){
        $order = Order::all();
        return view('Order-page')->with('order',$order);
    }

    
    public function create()
    {
        $customers = Customers::all();
        $products = Product::all(); 

        return view('Add-Order', compact('customers','products'));
    }
    
    public function store(Request $request)
    {
        // $request->validate([
        //     'Customer_ID'=>['required','integer'],
        //     'Product_ID' => 'required|array',
        //     'Product_ID.*' => 'exists:products,id',
        //     'O_Prices' => 'required|array',
        //     'O_Prices.*' => 'numeric|min:0'
        // ]);

        $order  = Order::create([
            'Customer_ID' => $request->customer_id,
            'O_Description'=> $request->Description,
        ]);

        foreach($request->products as $productID){
            $order->products()->attach($productID, ['P_Price'=>$request->Price[$productID]]);
        }
        return redirect()->route('Order')->with('success','Order Created Successfully');
    }
}
