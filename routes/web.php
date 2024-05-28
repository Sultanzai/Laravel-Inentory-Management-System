<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/customers', function () {
//     return view('Customer-Page');
// });

// Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');



//Cutomers
Route::get('/customer', [CustomerController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);



// Route::get('/customer', [PageController::class, 'customer'])->name('customer');

// Route::get('order', [PageController::class, 'order'])->name('order');

Route::get('payment', [PageController::class, 'payment'])->name('payment');

Route::get('expances', [PageController::class, 'expances'])->name('expances');
//Product
Route::get('product', [PageController::class, 'product'])->name('product');


