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
    public function AddOrder()
    {
        return view('Add-order');
    }


    //Customer form controller functions
    public function customerform()
    {
        return view('Customer-form');
    }
     //Customer form controller functions
     public function expancesform()
     {
         return view('Expances-form');
     }
}
