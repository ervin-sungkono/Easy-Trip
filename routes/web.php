<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

Route::prefix('admin')->middleware('isAdmin')->group(function () {
// Admin Routes
// GET

// POST

// PATCH

// DELETE

});

Route::middleware('auth')->group(function () {
// Member Routes
// GET

// POST

// PATCH

// DELETE

});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
