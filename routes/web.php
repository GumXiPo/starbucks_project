<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/', function () {
    return view('home');
});
//Route admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiển thị form đăng nhập
Route::post('login', [AuthController::class, 'login']); // Xử lý đăng nhập

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Hiển thị form đăng ký
Route::post('register', [AuthController::class, 'register']); // Xử lý đăng ký

Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Xử lý đăng xuất



//Route product
// Route cho danh sách sản phẩm
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products', [ProductController::class, 'menu'])->name('products.menu');
//Search sản phẩm
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');