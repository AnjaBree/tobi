<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// HTTP zahtevi
// facebook.com -> GET 'facebook.com' --> stranicu

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/about', function() {
    return view('about');
  })->name('about');

Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::post('/register', [RegisterController::class, 'register'])->name('post.register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('/products', ProductController::class);

Route::post('cart/delete', [CartController::class,'clear'])->name('cart.clear');
Route::resource('cart', CartController::class);