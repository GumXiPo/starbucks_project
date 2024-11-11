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
    // app/Http/Controllers/Auth/AuthController.php

    public function login(Request $request)
    {
        // Kiểm tra đăng nhập
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Kiểm tra xem người dùng có phải admin không
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công với tư cách quản trị viên.');
            } else {
                return redirect()->intended('/')->with('success', 'Đăng nhập thành công.');
            }
        }
        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }


    // Xử lý đăng xuất người dùng
    // app/Http/Controllers/Auth/AuthController.php

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Xóa session hiện tại
        $request->session()->regenerateToken(); // Tạo token mới để bảo mật

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
