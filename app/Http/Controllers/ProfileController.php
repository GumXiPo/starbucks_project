<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $profile = $user->profile; // Lấy thông tin profile của người dùng

        return view('profile.show', compact('user', 'profile'));
    }
    // Hiển thị trang chỉnh sửa profile
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'full_name' => 'required|string|max:255',
            
            'phone_number' => 'nullable|string|max:15', // Thêm validate cho số điện thoại
            'address' => 'nullable|string|max:255', // Thêm validate cho địa chỉ
            'is_active' => 'boolean',
        ]);

        // Update user information
        $user->username = $request->username;
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->is_active = $request->is_active;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Thông tin đã được cập nhật thành công!');
    }
}
