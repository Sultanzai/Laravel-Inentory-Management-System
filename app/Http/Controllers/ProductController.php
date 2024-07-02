<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\ProductOrderDetailView;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductOrderDetailView::all();
        $products = $products->sortByDesc('ID');
        return view('product-page')->with('product', $products);
    }

    public function create()
    {
        $products = Product::all();
        $products = $products->sortByDesc('id');
        return view('Add-stock')->with('product', $products);
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
            'P_Price' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,3})?$/'
            ],
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



    public function addStock(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'id' => 'required|exists:tbl_product,id',
            'P_Price' => 'required|numeric',
            'P_Units' => 'required|integer',
            'P_Status' => 'required|in:In Stock,Out Of stock,Shipped',
        ]);

        // Find the product by ID
        $product = Product::find($request->input('id'));

        // Check if the product exists
        if (!$product) {
            return redirect('/product')->with('error', 'Product not found');
        }

        // Update the product details
        $product->P_Price = $request->input('P_Price');
        $product->P_Units += $request->input('P_Units');  // Sum the existing Units with the new input
        $product->P_Status = $request->input('P_Status');
        $product->save();

        // Redirect back with success message
        return redirect('/product')->with('success', 'Product updated successfully');

    }
    
}
