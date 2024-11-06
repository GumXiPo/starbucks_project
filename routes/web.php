<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\AuthController;


Route::get('/', function () {
    return view('home');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiển thị form đăng nhập
Route::post('login', [AuthController::class, 'login']); // Xử lý đăng nhập

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Hiển thị form đăng ký
Route::post('register', [AuthController::class, 'register']); // Xử lý đăng ký

Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Xử lý đăng xuất




Route::get('/products', [ProductController::class, 'menu'])->name('products.menu');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');

// Hiển thị trang chỉnh sửa profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Cập nhật thông tin profile
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


                           