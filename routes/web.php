<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');

// Nhóm route cho Auth (Đăng nhập, Đăng ký, Đăng xuất)
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiển thị form đăng nhập
    Route::post('login', [AuthController::class, 'login']); // Xử lý đăng nhập
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Hiển thị form đăng ký
    Route::post('register', [AuthController::class, 'register']); // Xử lý đăng ký
    Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Xử lý đăng xuất
});

// Nhóm route cần xác thực (đăng nhập)
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add')
    ->where('productId', '[0-9]+'); // Kiểm tra productId là số nguyên
});

// Các route cho sản phẩm
Route::get('/products', [ProductController::class, 'menu'])->name('products.menu');
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show')
    ->where('id', '[0-9]+'); // Kiểm tra id là số nguyên
