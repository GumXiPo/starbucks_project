<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;

// Route cho trang chủ
Route::get('/', function () {
    return view('home');
});

// Route cho Admin (chỉ cho admin truy cập)
Route::prefix('admins')->middleware(EnsureUserIsAdmin::class)->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');  
});

// Đăng nhập, đăng ký và đăng xuất
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route cho sản phẩm
Route::get('/products/menu', [ProductController::class, 'menu'])->name('products.menu');
Route::get('/products/admin', [ProductController::class, 'index'])->name('products.adminproduct');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');

// Route cho profile
Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Nếu là admin, có thể truy cập trang chỉnh sửa profile admin
    Route::get('/profile/admin', [ProfileController::class, 'adminProfile'])->name('profile.adminProfile');
    Route::get('profile/editadminProfile/{id}', [ProfileController::class, 'editadminProfile'])->name('profile.admin.editadminProfile');
    Route::post('/profile/admin/updateadminProfile', [ProfileController::class, 'updateadminProfile'])->name('profile.updateadminProfile');
});

Route::middleware('auth')->group(function() {
  // Lấy giỏ hàng
  Route::get('/api/cart', [CartController::class, 'getCartItems']);
  // Thêm sản phẩm vào giỏ hàng
  Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.add');
  Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show');
});
