<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class); // 1 post belongs to 1 user
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // 1 post belongs to 1 category
    }
}
