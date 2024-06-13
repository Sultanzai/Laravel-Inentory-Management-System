<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\ProductOrderDetailView;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductOrderDetailView::all()->sortByDesc('P_Date');
        return view('product-page')->with('product', $products);
    }

    
    // public function show($id){
    //     $item = Product::findOrFail($id); //fetch item by id
    //     return view('product-view', compact('item'));
    // }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('productupdate', compact('product'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'P_Name' => 'required|string',
            'P_Description' => 'string',
            'P_Units' => 'required|numeric',
            'P_Price' => 'required|numeric',
            'P_Status' => 'required',
            'Barcode' => 'required|numeric'
        ]);

        // Find the Product record and update it
        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect('/product')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect('/product')->with('success', 'Product updated successfully');
    }
    
}
