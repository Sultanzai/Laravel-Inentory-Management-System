<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function order()
    {
        return view('Order-page');
    }
    
    public function payment()
    {
        return view('Payment-page');
    }
    
    public function expances()
    {
        return view('Expances-page');
    }
    
    public function products()
    {
        return view('Product-Page');
    }
    
    public function customer()
    {
        return view('Customer-page');
    }
}
