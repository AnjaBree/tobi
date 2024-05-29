<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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
Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::middleware('auth')->group(function () {
    Route::post('cart/delete', [CartController::class,'clear'])->name('cart.clear');
    Route::resource('cart', CartController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::resource('/products', ProductController::class)->except('index');
        Route::delete('/admin/{id}', [AdminController::class, 'delete'])->name('admin.delete');

        Route::resource('/category', CategoryController::class);
    });
});

