<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\OrderView;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{

    // public function create()
    // {
    //     $customers = Customers::all();
    //     $orderviews = OrderView::orderBy('O_Date', 'desc')->get();

    //     return view('Add-Payment', compact('customers','orderviews'));
    // }

    public function showCombinedData()
    {
        // Fetch payments
        $payments = Payment::all();

        // Fetch order view data
        $orderViews = OrderView::all();

        // Combine the data (example approach, adjust based on your needs)
        $combinedData = $payments->map(function ($payment) use ($orderViews) {
            $orderView = $orderViews->firstWhere('Order_ID', $payment->Order_ID);
            return [
                'PaymentID' => $payment->id,
                'P_Amount' => $payment->P_Amount,
                'P_Type' => $payment->P_Type,
                'P_Status' => $payment->P_Status,
                'P_Date' => $payment->P_Date,
                'Order_ID' => $payment->Order_ID,
                'Customer_ID' => $payment->Customer_ID,
                'Customer_Name' => $orderView ? $orderView->Customer_Name : null,
                'ProductNames' => $orderView ? $orderView->ProductNames : null,
                'TotalPrice' => $orderView ? $orderView->TotalPrice : null,
            ];
        });

        return view('Payment-Page', compact('combinedData'));
    }






    // public function store(Request $request)
    // {
      
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'PaymentAmount' => 'required|numeric',
    //         'Type' => 'required|string',
    //         'Status' => 'required|string',
    //         'Order_ID' => 'required|integer',
    //         'Customer_ID' => 'required|integer',
    //     ]);

    //     // Create a new payment record
    //     Payment::create([
    //         'P_Amount' => $validatedData['PaymentAmount'],
    //         'P_Type' => $validatedData['Type'],
    //         'P_Status' => $validatedData['Status'],
    //         'Order_ID' => $validatedData['Order_ID'],
    //         'Customer_ID' => $validatedData['Customer_ID'],
    //     ]);

    //     // Redirect to the payment page
    //     return redirect('/payment');
    // }
}
