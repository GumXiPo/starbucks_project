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

        // Kiểm tra nếu giỏ hàng chưa tồn tại thì khởi tạo
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã có trong giỏ chưa
        if(isset($cart[$product_id])) {
            // Nếu sản phẩm đã có, tăng số lượng
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa có, thêm mới
            $cart[$product_id] = [
                'product_id' => $product->product_id,
                'name' => $product->name,
                'price' => $product->price,
                'size' => $size,
                'sugar' => $sugar,
                'quantity' => $quantity,
            ];
            
        }

        // Cập nhật giỏ hàng vào session
        session()->put('cart', $cart);

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng.']);
    }

    public function showCart()
    {
        // Lấy giỏ hàng từ session, nếu không có thì mặc định là mảng rỗng
        $cart = session()->get('cart', []);

        // Truyền giỏ hàng vào view 'cart.show'
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
}
