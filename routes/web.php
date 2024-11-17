<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NotificationController;

// Route cho trang chủ
Route::get('/', function () {
  return view('home');
});

// Route cho Admin (chỉ cho admin truy cập)
Route::prefix('admins')->middleware(EnsureUserIsAdmin::class)->group(function () {
  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admins.dashboard');
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
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Route cho profile
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

  // Nếu là admin, có thể truy cập trang chỉnh sửa profile admin
  Route::get('/profile/admin', [ProfileController::class, 'adminProfile'])->name('profile.adminProfile');
  Route::get('profile/editadminProfile/{id}', [ProfileController::class, 'editadminProfile'])->name('profile.admin.editadminProfile');
  Route::post('/profile/admin/updateadminProfile', [ProfileController::class, 'updateadminProfile'])->name('profile.updateadminProfile');
  Route::get('/profile/showadmin', [ProfileController::class, 'showadmin'])->name('profile.showadmin');
});


Route::middleware('auth')->group(function () {
  // Các route liên quan đến giỏ hàng
  Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
  Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.add');
  Route::get('/api/cart', [CartController::class, 'getCartItems']);
});

// Feedback
Route::middleware('auth')->group(function () {
  // Hiển thị danh sách phản hồi
  Route::get('/feedback', [FeedbackController::class, 'feedbackshow'])->name('feedback.feedbackshow');
  // Gửi phản hồi mới
  Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
  Route::get('feedback/{id}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
  Route::put('/feedback/{id}', [FeedbackController::class, 'update'])->name('feedback.update');
});


// Route checkout
Route::middleware('auth')->group(function () {
  Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
  Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
  Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
});
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/orders', [OrderController::class, 'show'])->name('orders.index');
Route::get('/orders/revenue-chart', [OrderController::class, 'revenueChart'])->name('orders.revenue_chart');
Route::post('/orders/{orderId}/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/orders/showmore/{orderId}', [OrderController::class, 'showmore'])
  ->name('orders.showmore')
  ->withoutMiddleware(['auth']); // Tạm thời bỏ middleware auth để kiểm tra



// Route cho review sản phẩm
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'showReviews'])->name('reviews.index');


//Route notifications
Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
