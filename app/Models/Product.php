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

    public $timestamps = false; // Nếu bảng không có trường created_at và updated_at
}
