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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('customer.Create');
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
        // $customer = Customers::find($id);
        // return view('customer.show')->with('customer', $customer);
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
