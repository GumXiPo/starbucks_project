<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = Product::find($product_id);
    if (!$product) {
        return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
    }

    // Lấy các dữ liệu từ request
    $size = $request->input('size');
    $sugar = $request->input('sugar');
    $quantity = $request->input('quantity', 1); // Mặc định số lượng là 1

    // Tính giá dựa trên kích cỡ
    $price = $product->price;
    if ($size === 'M') {
        $price *= 1.2; // Giá size M tăng 20%
    } elseif ($size === 'L') {
        $price *= 1.5; // Ví dụ giá size L tăng 50%
    } elseif ($size === 'XL') {
        $price *= 1.7; // Ví dụ giá size XL tăng 70%
    }

    // Kiểm tra nếu giỏ hàng chưa tồn tại thì khởi tạo
    $cart = session()->get('cart', []);

    // Kiểm tra xem sản phẩm đã có trong giỏ chưa
    if (isset($cart[$product_id])) {
        // Nếu sản phẩm đã có, tăng số lượng
        $cart[$product_id]['quantity'] += $quantity;
    } else {
        // Nếu sản phẩm chưa có, thêm mới
        $cart[$product_id] = [
            'product_id' => $product->product_id,
            'name' => $product->name,
            'price' => $price, // Lưu giá đã tính theo size
            'size' => $size,
            'sugar' => $sugar,
            'quantity' => $quantity,
            'image' => $product->image, // Thêm hình ảnh của sản phẩm
        ];
    }

    // Cập nhật giỏ hàng vào session
    session()->put('cart', $cart);

    return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng.']);
}

    public function showCart()
{
    $cart = session()->get('cart', []);
    return view('cart.show', compact('cart'));
}

    public function getCartItems()
    {
        // Giả sử giỏ hàng được lưu trong session
        $cart = session()->get('cart', []);

        return response()->json([
            'cartItems' => $cart
        ]);
    }
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);  // Xóa sản phẩm khỏi giỏ hàng
            session()->put('cart', $cart);  // Lưu giỏ hàng đã cập nhật vào session

            return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.']);
        }

        return response()->json(['message' => 'Sản phẩm không tồn tại trong giỏ hàng.'], 404);
    }

}
