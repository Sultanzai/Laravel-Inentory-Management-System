<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ExpancesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Models\Customers;
use App\Models\Expances;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


//CUSTOMER ROUTES
Route::get('/customer', [CustomerController::class, 'index']);
// Insert Record 
Route::get('customerform', [PageController::class, 'customerform'])->name('customerform');
//Update Customer
Route::get('/customerupdate/{payment}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customerupdate/{payment}', [CustomerController::class, 'update'])->name('customer.update');
// Delete customer
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');





Route::get('/expances', [ExpancesController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);

Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
// Route::get('payment', [PageController::class, 'payment'])->name('payment');




// ORDER ROUTES
Route::get('/order', [OrderController::class, 'index']);
Route::get('Add-Order', [OrderController::class, 'create'])->name('Add-Order');
Route::post('orderstore', [OrderController::class, 'store'])->name('orderstore');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('Print-order');
// Route for Updating data
Route::get('/orderupdate/{payment}', [OrderController::class, 'edit'])->name('orderupdate.edit');
Route::post('/orderupdate/{payment}', [OrderController::class, 'update'])->name('orderupdate.update');
Route::get('orderupdate/{payment}', [OrderController::class, 'create'])->name('orderupdate.update');





//PAYMENT ROUTES
Route::get('payment', [PaymentController::class, 'showCombinedData'])->name('payment');
// Route for Updating Payment Form
Route::get('/paymentform/{payment}', [PaymentController::class, 'edit'])->name('payment.edit');
Route::post('/paymentform/{payment}', [PaymentController::class, 'update'])->name('payment.update');





//ExpancesForm route
Route::get('expancesform', [PageController::class, 'expancesform'])->name('expancesform');

//Productform Route
Route::get('productform', [PageController::class, 'productform'])->name('productform');

//Route for fetiching and display data 
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-view');
Route::get('/productupdate/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/productupdate/{product}', [ProductController::class, 'update'])->name('product.update');


// Addomg Customers
Route::post('/customerform', function () {
    Customers::create([
        'Name' => request('Name'),
        'Address' => request('Address'),
        'Phone' => request('Phone')
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
