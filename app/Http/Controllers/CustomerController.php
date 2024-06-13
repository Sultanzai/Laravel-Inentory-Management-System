<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */






    public function index()
    {
        $customer = Customers::all();
        return view('customer-page')->with('customer', $customer);
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

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
