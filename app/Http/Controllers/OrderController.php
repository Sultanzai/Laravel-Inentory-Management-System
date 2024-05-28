<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request){
        $validateData = $request->validate([
            'O_Description'=>'required|string|max:255',
            'O_Total'=>'required',
            'O_Date'=>'required|',
        ]);
        $order = Order::create($validateData);
        
    }
    public function index(){
        $order = Order::all();
        return view('Order-page')->with('order',$order);
    }
}
