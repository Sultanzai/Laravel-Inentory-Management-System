<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/customer', function () {
    return view('Expanses-page');
});

// Route::resource('/customer', CustomerController::class);
