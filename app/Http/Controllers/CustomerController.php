<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'Name' => 'required|string|max:255',
             'Address' => 'required|string|max:255',
             'Phone' => 'required|string|max:20',
         ]);
 
         $customer = Customers::create($validatedData);
 
         return response()->json(['message' => 'Customer created successfully', 'customer' => $customer], 201);
     }





    // public function index()
    // {
    //     $customer = Customers::all();
    //     return view('customer.index')->with('customer', $customer);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customers::find($id);
        return view('customer.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
