<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/customer', function () {
    return view('customer');
});

Route::resource('/customer', CustomerController::class);
