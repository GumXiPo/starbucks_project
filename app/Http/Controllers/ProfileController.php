<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule; // Thêm dòng này


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $profile = $user->profile; // Lấy thông tin profile của người dùng

        return view('profile.show', compact('user', 'profile'));
    }
    public function adminProfile()
    {
        $user = User::all();
        return view('profile.adminProfile', compact('user'));
    }

    // Hiển thị trang chỉnh sửa profile
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    public function editadminProfile($id)
    {
        // Tìm người dùng dựa trên id
        $user = User::findOrFail($id);

        // Truyền biến user vào view
        return view('profile.editadminProfile', compact('user'));
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

    public function updateadminProfile(Request $request)
{
    $user = Auth::user();

    // Chỉ cập nhật các trường có dữ liệu mới
    if ($request->filled('username') && $request->username !== $user->username) {
        // Kiểm tra tính duy nhất của username
        if (User::where('username', $request->username)->exists()) {
            return redirect()->back()->with('error', 'Tên đăng nhập đã tồn tại.');
        }
        $user->username = $request->username;
    }

    if ($request->filled('email') && $request->email !== $user->email) {
        // Kiểm tra tính duy nhất của email
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email đã tồn tại.');
        }
        $user->email = $request->email;
    }

    if ($request->filled('full_name')) {
        $user->full_name = $request->full_name;
    }

    if ($request->filled('phone_number')) {
        $user->phone_number = $request->phone_number;
    }

    if ($request->filled('address')) {
        $user->address = $request->address;
    }

    if ($request->has('is_active')) {
        $user->is_active = $request->is_active;
    }

    // Lưu thông tin đã cập nhật
    $user->save();

    // Quay lại với thông báo thành công
    return redirect()->route('profile.adminProfile')->with('success', 'Thông tin đã được cập nhật thành công!');
}

    

}
