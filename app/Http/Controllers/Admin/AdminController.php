<?php

namespace App\Http\Controllers\Admin; // Namespace chính xác
use App\Models\Feedback;
use App\Models\Product;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {

        $feedbacks = Feedback::with('user')->get();
        $product = Product::all();

        return view('admins.dashboard', compact('feedbacks','product'));
    }
}
