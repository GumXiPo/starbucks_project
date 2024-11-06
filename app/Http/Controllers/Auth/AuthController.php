<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login'); // Tạo view login.blade.php
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Thử đăng nhập người dùng
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Kiểm tra xem tài khoản có hoạt động không
            if (Auth::user()->is_active) {
                // Kiểm tra vai trò của người dùng
                if (Auth::user()->role === 'admin') {
                    // Quản trị viên được chuyển hướng đến trang quản trị
                    return redirect()->intended('/admin')->with('success', 'Đăng nhập thành công với tư cách quản trị viên.');
                } else {
                    // Người dùng bình thường được chuyển hướng về trang người dùng
                    return redirect()->intended('/')->with('success', 'Đăng nhập thành công.');
                }
            } else {
                // Đăng xuất nếu tài khoản không hoạt động
                Auth::logout();
                return back()->withErrors(['email' => 'Tài khoản của bạn đã bị vô hiệu hóa.']);
            }
        }

        // Nếu đăng nhập thất bại
        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    // Đăng xuất người dùng
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công.');
    }

    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register'); // Đảm bảo rằng bạn có view này
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'full_name' => 'required|string|max:255', // Thêm quy tắc xác thực cho full_name
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'full_name' => $request->input('full_name'), // Lấy giá trị full_name từ request
            'password' => bcrypt($request->input('password')),
            'role' => 'user', // Hoặc giá trị mặc định khác
            'is_active' => 1, // Hoặc giá trị mặc định khác
        ]);

        // Đăng nhập người dùng sau khi đăng ký thành công
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Đăng ký thành công, bạn đã được đăng nhập.');
    }
}
