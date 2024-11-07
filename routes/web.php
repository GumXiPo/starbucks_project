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
Route::get('/products/menu', [ProductController::class, 'menu'])->name('products.menu');
Route::get('/products/admin', [ProductController::class, 'index'])->name('products.adminproduct');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');
// Route cho trang chỉnh sửa sản phẩm
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route cho việc cập nhật sản phẩm
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products', [ProductController::class, 'menu'])->name('products.menu');
//Search sản phẩm
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');



//Route profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/admin', [ProfileController::class, 'adminProfile'])->name('profile.adminProfile');
// Hiển thị trang chỉnh sửa profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('profile/editadminProfile/{id}', [ProfileController::class, 'editadminProfile'])->name('profile.admin.editadminProfile');



// Cập nhật thông tin profile
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/admin/updateadminProfile', [ProfileController::class, 'updateadminProfile'])->name('profile.updateadminProfile');


                           