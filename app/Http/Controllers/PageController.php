<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('Dashboard');
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
     public function addstock()
     {
         return view('Add-stock');
     }
}
