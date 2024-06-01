<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product-page')->with('product', $product);
    }
    public function show($id){
        $item = Product::findOrFail($id); //fetch item by id
        return view('product-view', compact('item'));
    }
}
