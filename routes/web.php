<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// LOGIN ROUTES
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');



    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');



    // CUSTOMER ROUTES
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('customerform', [PageController::class, 'customerform'])->name('customerform');
    // Update Customer & Delete
    Route::get('/customerupdate/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customerupdate/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    // Adding Customers
    Route::post('/customerform', function () {
        Customers::create([
            'Name' => request('Name'),
            'Address' => request('Address'),
            'Phone' => request('Phone'),
        ]);
        return redirect('/customer');
    });



    // EXPANSES ROUTES
    Route::get('/expances', [ExpancesController::class, 'index']);
    // Update
    Route::get('/expancesupdate/{expances}', [ExpancesController::class, 'edit'])->name('expances.edit');
    Route::post('/expancesupdate/{expances}', [ExpancesController::class, 'update'])->name('expances.update');
    // Delete customer
    Route::delete('/expances/{expances}', [ExpancesController::class, 'destroy'])->name('expances.destroy');
    // ExpancesForm route
    Route::get('expancesform', [PageController::class, 'expancesform'])->name('expancesform');
    // Adding expanses
    Route::post('/expancesform', function () {
        Expances::create([
            'E_Name' => request('Name'),
            'E_Descriptio' => request('Description'),
            'E_Amount' => request('Amount'),
        ]);
        return redirect('/expances');
    });



    // ORDER ROUTES
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('Add-Order', [OrderController::class, 'create'])->name('Add-Order');
    Route::post('orderstore', [OrderController::class, 'store'])->name('orderstore');
    // Route for passing data in print page 
    Route::get('/order/{id}', [OrderController::class, 'printOrder'])->name('print-order');
    // Route::get('/order/{id}', [OrderController::class, 'show'])->name('Print-order');
    // Route for Updating data
    Route::get('/orderupdate/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/orderupdate/{id}', [OrderController::class, 'update'])->name('order.update');
    // Delete Order
    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');


    // PAYMENT ROUTES
    Route::get('payment', [PaymentController::class, 'showCombinedData'])->name('payment');
    // Route for Updating Payment Form
    Route::get('/paymentform/{payment}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/paymentform/{payment}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('Paymentform', [PaymentController::class, 'create'])->name('Paymentform');
    Route::post('/Paymentform', [PaymentController::class, 'store'])->name('Paymentform');



    // PRODUCT ROUTES
    Route::get('/product', [ProductController::class, 'index']);
    // Productform Route
    Route::get('productform', [PageController::class, 'productform'])->name('productform');
    // Route for fetching and display data 
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-view');
    Route::get('/productupdate/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/productupdate/{product}', [ProductController::class, 'update'])->name('product.update');
    // Deleting product 
    Route::delete('/Product/{product}', [ProductController::class, 'destroy'])->name('Product.destroy');
    Route::get('addstock', [ProductController::class, 'create'])->name('addstock');
    Route::post('/addStock', [ProductController::class, 'addStock'])->name('addStock');
    Route::get('/print-products', [ProductController::class, 'print']);


    Route::post('/productform', function () {
        Product::create([
            'P_Name' => request('Name'),
            'P_Description' => request('Description'),
            'P_Units' => request('Units'),
            'P_Price' => request('Price'),
            'P_Status' => request('Status'),
            'Barcode' => request('Barcode'),
        ]);
        return redirect('/product');
    });



    // Reports 
    Route::get('/SalesReport', [OrderController::class, 'report']);
    Route::get('/PaymentReport', [PaymentController::class, 'report']);
    Route::get('/ExpensesReport', [ExpancesController::class, 'report']);



});
