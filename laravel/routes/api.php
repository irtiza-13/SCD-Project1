<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GameSubscriptionController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ---------------------------
// PRODUCT APIs
// ---------------------------

// GET all products
Route::get('/products', [ProductController::class, 'apiAll']);

// GET single product
Route::get('/products/{id}', [ProductController::class, 'apiShow']);

// Create new product
Route::post('/products', [ProductController::class, 'apiStore']);

// Update product
Route::put('/products/{id}', [ProductController::class, 'apiUpdate']);

// Delete product
Route::delete('/products/{id}', [ProductController::class, 'apiDelete']);


// ---------------------------
// GAME SUBSCRIPTION APIs
// ---------------------------

// GET all subscriptions
Route::get('/game-subscriptions', [GameSubscriptionController::class, 'apiAll']);

// GET single subscription
Route::get('/game-subscriptions/{id}', [GameSubscriptionController::class, 'apiShow']);

// Create subscription
Route::post('/game-subscriptions', [GameSubscriptionController::class, 'apiStore']);

// Update subscription
Route::put('/game-subscriptions/{id}', [GameSubscriptionController::class, 'apiUpdate']);

// Delete subscription
Route::delete('/game-subscriptions/{id}', [GameSubscriptionController::class, 'apiDelete']);
