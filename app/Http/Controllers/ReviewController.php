<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show($id)
{
    // Nạp sản phẩm và các phản hồi liên quan
    $product = Product::with('reviews.user')->findOrFail($id);
    
    return view('products.show', compact('product'));
}

    // Phương thức lưu phản hồi
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Phản hồi đã được gửi thành công.');
    }
}
