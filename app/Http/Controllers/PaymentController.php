<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\OrderView;
class PaymentController extends Controller
{

    public function create()
    {
        $customers = Customers::all();
        $orderviews = OrderView::orderBy('O_Date', 'desc')->get();

        return view('Add-Payment', compact('customers','orderviews'));
    }
    public function store(Request $request)
    {
       

    

        // return redirect('/payment')->with('success','');
    }
}
