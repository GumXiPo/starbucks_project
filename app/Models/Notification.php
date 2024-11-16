<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Khai báo tên bảng (nếu cần, mặc định sẽ là 'notifications')
    protected $table = 'notifications';

    // Khai báo các thuộc tính có thể được gán giá trị hàng loạt
    protected $fillable = [
        'message',
        'status', // Trạng thái đã đọc hay chưa
    ];

    // Tùy chọn: Thêm các hàm quan hệ nếu cần, ví dụ như quan hệ với user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Quan hệ với Order
    public function order()
    {
        return $this->belongsTo(Order::class); // Giả sử bạn đã có model Order
    }
}
