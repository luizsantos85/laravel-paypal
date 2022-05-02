<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

Route::get('/', [ShopController::class, 'index'])->name('home');

Route::get('/remove-cart/{id}', [CartController::class, 'decrement'])->name('remove.cart');
Route::get('/add-cart/{id}', [CartController::class, 'add'])->name('add.cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
