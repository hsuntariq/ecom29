<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin/dashboard', 'admin.dashboard')->name('dashboard');
Route::view('/admin/products', 'admin.products')->name('products');
Route::view('/admin/orders', 'admin.orders')->name('orders');
Route::view('/admin/customers', 'admin.customers')->name('customers');
Route::post('/add-product', [ProductController::class, 'addProduct']);

Route::view('/', 'user.home')->name('home');                    // landing page
Route::view('/product', 'user.product-show')->name('product');  // single product page
Route::view('/checkout', 'user.checkout')->name('checkout');    // payment page
