<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'total_amount', 'address', 'phone_number', 'name', 'email', 'note', 'products'
    ];

    // Quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
