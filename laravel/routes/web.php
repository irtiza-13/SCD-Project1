<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;


use App\Http\Controllers\GameSubscriptionController;

// Frontend routes
Route::get('/game-subscriptions', [GameSubscriptionController::class, 'index'])
    ->name('game-subscriptions.index');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/game-subscriptions', [GameSubscriptionController::class, 'adminIndex'])
        ->name('game-subscriptions.admin.index');
    
    Route::get('/game-subscriptions/create', [GameSubscriptionController::class, 'create'])
        ->name('game-subscriptions.create');
    
    Route::post('/game-subscriptions', [GameSubscriptionController::class, 'store'])
        ->name('game-subscriptions.store');
    
    Route::get('/game-subscriptions/{gameSubscription}/edit', [GameSubscriptionController::class, 'edit'])
        ->name('game-subscriptions.edit');
    
    Route::put('/game-subscriptions/{gameSubscription}', [GameSubscriptionController::class, 'update'])
        ->name('game-subscriptions.update');
    
    Route::delete('/game-subscriptions/{gameSubscription}', [GameSubscriptionController::class, 'destroy'])
        ->name('game-subscriptions.destroy');
});

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

Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/products', [ProductController::class, 'apiAll']);


Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard.index');

// Protected admin product routes
Route::middleware(['admin.auth'])
    ->prefix('admin/products')
    ->name('admin.products.')
    ->group(function() {
    Route::get('/', [ProductController::class, 'adminIndex'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');


    
});


Route::post('/search', [ProductController::class, 'search'])->name('search');

// If you want a GET route as well (optional):
Route::get('/search', [ProductController::class, 'search'])->name('search.get');

