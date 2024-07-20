<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CustomerController extends Controller
{

    
    public function index()
    {

        $customer = DB::table('tbl_customer as c')
        ->leftJoin('tbl_orders as o', 'c.id', '=', 'o.Customer_ID')
        ->leftJoin('tbl_orderdetail as od', 'o.id', '=', 'od.Order_ID')
        ->select(
            'c.id as Customer_ID',
            'c.Name',
            'c.Address',
            'c.Phone',
            DB::raw('SUM(od.O_Price * od.O_unit) as Total_Amount')
        )
        ->groupBy('c.id', 'c.Name', 'c.Address', 'c.Phone')
        ->get();

        return view('customer-page', compact('customer'));



        // $customer = Customers::all();
        // return view('customer-page')->with('customer', $customer);
    }

    public function edit($id)
    {
        $customer = Customers::findOrFail($id);

        return view('Customerupdate', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Name' => 'required|string',
            'Address' => 'required|string',
            'Phone' => 'required|numeric'
        ]);

        // Find the Customer record and update it
        $customer = Customers::findOrFail($id);
        $customer->update($validatedData);

        return redirect('/customer')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();

        return redirect('/customer')->with('success', 'Customer Deleted successfully');
    }

}
