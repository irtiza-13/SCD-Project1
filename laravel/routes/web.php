<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

// Optional: Category-specific routes
Route::get('/products/windows', function () {
    return view('products', ['category' => 'windows']);
});

Route::get('/products/console', function () {
    return view('products', ['category' => 'console']);
});

Route::get('/products/handheld', function () {
    return view('products', ['category' => 'handheld']);
});