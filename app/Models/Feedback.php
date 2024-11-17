<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'rating'];


    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');  // 'user_id' là trường khóa ngoại, 'id' là khóa chính của bảng users
}

}
