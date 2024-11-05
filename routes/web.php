<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('home');
});

//Route đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/products', [ProductController::class, 'menu'])->name('products.menu');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');

// Hiển thị trang chỉnh sửa profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Cập nhật thông tin profile
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


                           