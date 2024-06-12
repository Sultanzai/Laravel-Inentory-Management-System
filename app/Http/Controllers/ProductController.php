<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\ProductOrderDetailView;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = ProductOrderDetailView::all();
        return view('product-page')->with('product', $product);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $products = Product::where('P_Name', 'LIKE', "%$query%")
    //                         ->orWhere('Barcode', 'LIKE', "%$query%")
    //                         ->get();

    //     return response()->json($products);
    // }

    // public function view($id){
    //     $item = Product::findOrFail($id); //fetch item by id
    //     return view('product-view', compact('item'));
    // }
    
    public function show($id){
        $item = Product::findOrFail($id); //fetch item by id
        return view('product-view', compact('item'));
    }
    
}
