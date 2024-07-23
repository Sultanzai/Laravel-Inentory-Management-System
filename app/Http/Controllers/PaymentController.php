<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\OrderView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class PaymentController extends Controller
{

    public function create()
    {
        $order = OrderView::all();
        $order = $order->sortByDesc('Order_ID');
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
                'P_Remining' => $payment->P_Remining,
                'P_Type' => $payment->P_Type,
                'P_Status' => $payment->P_Status,
                'P_Date' => $payment->P_Date,
                'Order_ID' => $payment->Order_ID,
                'Customer_Name' => $orderView ? $orderView->Customer_Name : null,
                'ProductNames' => $orderView ? $orderView->ProductNames : null,
                'TotalPrice' => $orderView ? $orderView->TotalPrice : null,
            ];
        });
    
        // Sort by P_Date in descending order
        $sortedData = $combinedData->sortByDesc('PaymentID');
    
        return view('Payment-Page', compact('sortedData'));
    }

    public function Report()
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
                'P_Remining' => $payment->P_Remining,
                'P_Type' => $payment->P_Type,
                'P_Status' => $payment->P_Status,
                'P_Date' => $payment->P_Date,
                'Order_ID' => $payment->Order_ID,
                'Customer_Name' => $orderView ? $orderView->Customer_Name : null,
                'ProductNames' => $orderView ? $orderView->ProductNames : null,
                'TotalPrice' => $orderView ? $orderView->TotalPrice : null,
            ];
        });
    
        // Sort by P_Date in descending order
        $sortedData = $combinedData->sortByDesc('PaymentID');
    
        return view('PaymentReport', compact('sortedData'));
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
            'P_Amount' => 'nullable|numeric',
            'P_Type' => 'required|string',
            'P_Status' => 'required|string',
            'Order_ID' => 'nullable|integer',
            'P_Date' => 'required|date'
        ]);
    
        // Find the payment record
        $payment = Payment::findOrFail($id);
    
        // Update the payment record with the validated data
        $payment->update($validatedData);
    
        // Calculate the total sum of P_Amount for the given Order_ID
        $totalAmount = Payment::where('Order_ID', $payment->Order_ID)->sum('P_Amount');
    
        // Calculate the new remaining amount
        // If you want P_Remining to be the difference between the total amount and the current payment amount, you can adjust accordingly
        $payment->P_Remining = $totalAmount - $payment->P_Amount;
    
        // Save the updated payment record with the new remaining amount
        $payment->save();
    
        return redirect('/payment')->with('success', 'Payment updated successfully');
    }

    // Store Record 
    public function store(Request $request)
    {
        // SUM All Payment amount
        $totalPaidAmount = Payment::where('Order_ID', $request->OrderID)->sum('P_Amount');

        $totalProposedAmount = $totalPaidAmount + $request->P_Amount;
        
        if ($totalProposedAmount > $request->TotalPrice) {
            return redirect()->back()->withErrors(['error' => 'Payment Amount is Greater than Order Amount!'])->withInput();
        }
    
        $remaining = $request->TotalPrice - $totalProposedAmount;
    
        // Create the payment
        $payment = Payment::create([
            'Order_ID' => $request->OrderID,
            'P_Amount' => $request->P_Amount,
            'P_Remining' => $remaining,
            'P_Type' => $request->P_Type,
            'P_Status' => $request->P_Status,
            'Customer_ID' => $request->Customer_ID,
            'P_Date' => $request->P_Date,
        ]);
    
        // Check if the payment was created successfully
        if (!$payment) {
            return redirect()->back()->withErrors(['error' => 'Payment creation failed'])->withInput();
        }
    
        // Find the specific record in order_view
        $orderView = OrderView::where('Order_ID', $request->OrderID)->first();
    
        // Redirect or return a success response
        return redirect('/payment')->with('success', 'Payment created successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect('/payment')->with('success', 'Payment Delete successfully');
    }

}
