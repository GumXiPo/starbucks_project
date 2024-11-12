<?php
// Model CartItem
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'product_detail_id', 'quantity'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productDetail()
    {
        return $this->belongsTo(Cart::class, 'product_detail_id');
    }

    public function cart()
    {
        return $this->belongsTo(Carts::class, 'cart_id');
    }
}