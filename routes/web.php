<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ExpancesController;
use App\Models\Customers;
use App\Models\Expances;
use Illuminate\Support\Facades\Route;

// Route::get('/customers', function () {
//     return view('Customer-Page');
// });

// Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');



//Main Routes
Route::get('/customer', [CustomerController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);

Route::get('/expances', [ExpancesController::class, 'index']);



// Route::get('/customer', [PageController::class, 'customer'])->name('customer');

// Route::get('order', [PageController::class, 'order'])->name('order');

Route::get('payment', [PageController::class, 'payment'])->name('payment');

//Product
Route::get('product', [PageController::class, 'product'])->name('product');

//customer form route 
Route::get('customerform', [PageController::class, 'customerform'])->name('customerform');
//Expances Form route
Route::get('expancesform', [PageController::class, 'expancesform'])->name('expancesform');

// Route::post('customerform', [PageController::class,'customerRegister']);

Route::post('/customerform', function () {
    Customers::create([
        'Name' => request('Name'),
        'Address' => request('Address'),
        'Phone' => request('Phone'),
        'Balance' => request('Balance')
    ]);
    return redirect('/customer');
});

Route::post('/expancesform', function () {
    Expances::create([
        'E_Name' => request('Name'),
        'E_Descriptio' => request('Description'),
        'E_Amount' => request('Amount')
    ]);
    return redirect('/expances');
});

