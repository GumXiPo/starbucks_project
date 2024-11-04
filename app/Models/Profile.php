<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Một profile thuộc về một user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
