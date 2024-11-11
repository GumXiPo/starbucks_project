<?php

namespace App\Http\Controllers\Admin; // Namespace chính xác

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');  // Đảm bảo view tồn tại
    }
}
