<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->middleware('isAdmin')->group(function () {
// Admin Routes
// GET

// POST

// PATCH

// DELETE

});

Route::middleware('auth')->group(function () {
// Authenticated User Routes
// GET

// POST

// PATCH

// DELETE

});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ItemController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ItemController::class, 'viewDetail'])->name('product.detail');
Route::get('/search', [ItemController::class, 'search'])->name('search');

Route::get('/login/{provider}', [SocialAccountController::class, 'redirectProvider']);
Route::get('/{provider}/callback', [SocialAccountController::class, 'providerCallback']);
