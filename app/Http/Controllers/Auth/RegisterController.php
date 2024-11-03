<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Đảm bảo rằng bạn có view này
    }

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
