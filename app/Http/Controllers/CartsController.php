<?php
// Controller CartController
namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng của người dùng
    public function showCart()
    {
        $cart = Carts::where('user_id', Auth::id())->first();

        // Nếu không có giỏ hàng, tạo mới giỏ hàng
        if (!$cart) {
            $cart = Carts::create(['user_id' => Auth::id()]);
        }

        $items = $cart->items()->with(['product', 'productDetail'])->get(); // Lấy tất cả sản phẩm trong giỏ và chi tiết sản phẩm

        return view('cart.show', compact('items'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($product_id, $detail_id)
    {
        $cart = Carts::firstOrCreate(['user_id' => Auth::id()]); // Tìm hoặc tạo giỏ hàng mới
        $product = Product::findOrFail($product_id);
        $productDetail = Cart::findOrFail($detail_id);

        // Kiểm tra sản phẩm đã có trong giỏ hay chưa
        $cartItem = CartItem::where('cart_id', $cart->cart_id)
                            ->where('product_id', $product_id)
                            ->where('product_detail_id', $detail_id)
                            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ, tăng số lượng
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Nếu chưa có, thêm sản phẩm vào giỏ
            CartItem::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $product_id,
                'product_detail_id' => $detail_id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.show');
    }
}
