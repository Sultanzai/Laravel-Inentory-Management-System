<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('Dashboard');
    } 
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
    
    public function product()
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
     //Expances form controller functions
     public function expancesform()
     {
         return view('Expances-form');
     }
    //Product form controller functions
     public function productform()
     {
         return view('Add-product');
     }
     public function Paymentform()
     {
         return view('Add-Payment');
     }
}
