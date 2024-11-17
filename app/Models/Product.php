<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Tên bảng

    protected $primaryKey = 'product_id'; // Khóa chính

    // Danh sách các trường có thể được gán giá trị hàng loạt
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'category',
        'is_available',
        'stock_quantity',
        'supplier',
    ];
    public function getPriceBySize($size)
    {
        // Ví dụ: Trả về giá khác nhau tùy thuộc vào size
        switch ($size) {
            case 'small':
                return $this->price * 0.9; // Ví dụ: giảm 10% cho size nhỏ
            case 'large':
                return $this->price * 1.1; // Ví dụ: tăng 10% cho size lớn
            default:
                return $this->price; // Giá mặc định
        }
    }

    public $timestamps = false; // Nếu bảng không có trường created_at và updated_at
     // Mối quan hệ với bảng FeedbackProduct
    
     public function reviews()
     {
         return $this->hasMany(Review::class, 'product_id');
     }
     public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
                    ->withPivot('quantity', 'price_at_purchase', 'created_at', 'updated_at');
    }
     
}
