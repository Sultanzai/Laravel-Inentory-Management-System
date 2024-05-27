<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/customers', function () {
    return view('Customer-Page');
});

// Route::resource('/customer', CustomerController::class);

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
