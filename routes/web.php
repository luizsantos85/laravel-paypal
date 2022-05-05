<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/', [ShopController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/add-cart/{id}', [CartController::class, 'add'])->name('add.cart');
Route::get('/remove-cart/{id}', [CartController::class, 'decrement'])->name('remove.cart');

Route::middleware('auth')->prefix('profile')->group(function(){
    Route::get('/', [UserController::class, 'profile'])->name('profile');
    Route::get('logout', [UserController::class, 'logout'])->name('profile.logout');
    Route::put('update', [UserController::class, 'updateName'])->name('profile.update');

    Route::get('user-password', [UserController::class, 'userPass'])->name('profile.userPass');
    Route::put('update-password', [UserController::class, 'updatePass'])->name('profile.updatePass');


});



