<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_id';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'status',
        'size',
        'sugar_content',
        'additional_info'
    ];

    // Liên kết đến sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Tính tổng giá trị của sản phẩm trong giỏ hàng
    public function getTotalPrice()
    {
        // Nếu sản phẩm có nhiều mức giá tùy theo size, bạn có thể tính giá theo size
        // Ví dụ: nếu có cột 'price' trong bảng sản phẩm thì có thể thay đổi logic tính giá theo size
        $productPrice = $this->product->price; 
        
        // Kiểm tra giá dựa trên size (nếu cần)
        if ($this->size && method_exists($this->product, 'getPriceBySize')) {
            $productPrice = $this->product->getPriceBySize($this->size);
        }

        return $productPrice * $this->quantity;  
    }

    // Tính tổng giá trị của tất cả sản phẩm trong giỏ hàng của người dùng
    public static function getTotalCartPriceForUser($userId)
    {
        $cartItems = self::where('user_id', $userId)->with('product')->get();
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item->getTotalPrice();
        }

        return $totalPrice;
    }
}
