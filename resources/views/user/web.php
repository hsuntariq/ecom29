<?php

use Illuminate\Support\Facades\Route;

// Storefront
Route::view('/', 'home')->name('home');
Route::view('/product', 'product-show')->name('product');
Route::view('/checkout', 'checkout')->name('checkout');

// Admin panel
Route::prefix('admin')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('/products', 'products')->name('products');
    Route::view('/orders', 'orders')->name('orders');
    Route::view('/customers', 'customers')->name('customers');
});
