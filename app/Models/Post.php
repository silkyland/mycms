<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; // กำหนดชื่อของตารางที่ต้องการเชื่อมโยง

    protected $primaryKey = 'id'; // กำหนดชื่อ Primary Key ของตารางที่ต้องการเชื่อมโยง

    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // 1 post belongs to 1 user
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // 1 post belongs to 1 category
    }
}
