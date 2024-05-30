<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ExpancesController;
use App\Http\Controllers\ProductController;
use App\Models\Customers;
use App\Models\Expances;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/customers', function () {
//     return view('Customer-Page');
// });

// Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');



//Display Main Data Routes
Route::get('/customer', [CustomerController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);

Route::get('/expances', [ExpancesController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);




// Route::get('/customer', [PageController::class, 'customer'])->name('customer');

// Route::get('order', [PageController::class, 'order'])->name('order');
Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('payment', [PageController::class, 'payment'])->name('payment');




//customerform route 
Route::get('customerform', [PageController::class, 'customerform'])->name('customerform');
//ExpancesForm route
Route::get('expancesform', [PageController::class, 'expancesform'])->name('expancesform');
//Productform Route
Route::get('productform', [PageController::class, 'productform'])->name('productform');




// Addomg Customers
Route::post('/customerform', function () {
    Customers::create([
        'Name' => request('Name'),
        'Address' => request('Address'),
        'Phone' => request('Phone'),
        'Balance' => request('Balance')
    ]);
    return redirect('/customer');
});

// Adding expanses
Route::post('/expancesform', function () {
    Expances::create([
        'E_Name' => request('Name'),
        'E_Descriptio' => request('Description'),
        'E_Amount' => request('Amount')
    ]);
    return redirect('/expances');
});

//Adding products
Route::post('/productform', function () {
    Product::create([
        'P_Name' => request('Name'),
        'P_Description' => request('Description'),
        'P_Units' => request('Units'),
        'P_Price' => request('Price'),
        'P_Status' => request('Status'),
        'Barcode' => request('Barcode')
    ]);
    return redirect('/product');
});