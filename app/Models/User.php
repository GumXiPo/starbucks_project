<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'username',      // Thêm trường username
        'email',
        'password',
        'full_name',     // Thêm trường full_name
        'role',          // Thêm trường role
        'is_active',     // Thêm trường is_active
    ];

    // Các trường sẽ không được hiển thị khi lấy dữ liệu
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
