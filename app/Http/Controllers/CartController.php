<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }

        // Lấy ID của người dùng
        $userId = Auth::id();

        // Kiểm tra sản phẩm có tồn tại trong cơ sở dữ liệu không
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'Product not found.');
        }

        // Kiểm tra xem sản phẩm có còn trong kho không
        if ($product->stock <= 0) {
            return redirect()->route('cart.index')->with('error', 'Product is out of stock.');
        }

        // Lấy giá trị quantity và size từ request
        $quantity = (int) $request->input('quantity', 1);
        $size = $request->input('size', null); // Lấy size từ request, nếu không có thì mặc định là null

        // Kiểm tra xem quantity có hợp lệ không
        if ($quantity <= 0) {
            return redirect()->route('cart.index')->with('error', 'Quantity must be greater than 0.');
        }

        // Kiểm tra size có hợp lệ không
        if (empty($size)) {
            return redirect()->route('cart.index')->with('error', 'Please select a size.');
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->where('size', $size)
                        ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có và có size trùng khớp, cộng dồn số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'size' => $size, // Lưu size vào bảng carts
            ]);
        }

        // Quay lại giỏ hàng với thông báo thành công
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }
    public function index()
    {
        // Lấy ID của người dùng đã đăng nhập
        $userId = Auth::id();

        // Lấy tất cả sản phẩm trong giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // Kiểm tra nếu giỏ hàng trống
        if ($cartItems->isEmpty()) {
            return view('cart.index')->with('message', 'Your cart is empty.');
        }

        // Hiển thị giỏ hàng
        return view('cart.index', compact('cartItems'));
    }
}
