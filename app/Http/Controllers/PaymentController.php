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

    public function create()
    {
        $order = Order::all();
        $order = $order->sortByDesc('id');
        return view('Add-Payment', compact('order'));
    }
    // Displaying combined Data 
    public function showCombinedData()
    {
        // Fetch payments
        $payments = Payment::all();
    
        // Fetch order view data
        $orderViews = OrderView::all();
    
        // Combine the data
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
    
        // Sort by P_Date in descending order
        $sortedData = $combinedData->sortByDesc('P_Date');
    
        return view('Payment-Page', compact('sortedData'));
    }

    // Updating Payment Tables 
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('Update-Payment', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'P_Amount' => 'required|numeric',
            'P_Type' => 'required|string',
            'P_Status' => 'required|string',
            'Order_ID' => 'required|integer',
            'Customer_ID' => 'required|integer',
            'P_Date' => 'required|date'
        ]);

        // Find the payment record and update it
        $payment = Payment::findOrFail($id);
        $payment->update($validatedData);

        return redirect('/payment')->with('success', 'Payment updated successfully');
    }




}
