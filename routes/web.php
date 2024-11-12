<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('home');
});

//Route admin
// Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::prefix('admins')->middleware(EnsureUserIsAdmin::class)->group(function () {
  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');  
});

// Đăng nhập và đăng ký
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiển thị form đăng nhập
Route::post('login', [AuthController::class, 'login']); // Xử lý đăng nhập

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Hiển thị form đăng ký
Route::post('register', [AuthController::class, 'register']); // Xử lý đăng ký

Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Xử lý đăng xuất

// Route cho sản phẩm
Route::get('/products/menu', [ProductController::class, 'menu'])->name('products.menu');
Route::get('/products/admin', [ProductController::class, 'index'])->name('products.adminproduct');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products', [ProductController::class, 'menu'])->name('products.menu');
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');

// Route profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/profile/admin', [ProfileController::class, 'adminProfile'])->name('profile.adminProfile');

// Hiển thị trang chỉnh sửa profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('profile/editadminProfile/{id}', [ProfileController::class, 'editadminProfile'])->name('profile.admin.editadminProfile');

// Cập nhật thông tin profile
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/admin/updateadminProfile', [ProfileController::class, 'updateadminProfile'])->name('profile.updateadminProfile');

//Cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');

Route::middleware('auth')->group(function() {
  Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.add');
  Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
});


//Feedback
Route::middleware('auth')->group(function() {
  // Hiển thị danh sách phản hồi
  Route::get('/feedback', [FeedbackController::class, 'feedbackshow'])->name('feedback.feedbackshow');
  
  // Gửi phản hồi mới
  Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});
