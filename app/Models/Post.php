<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'description',
        'content',
        'is_hide',
        'is_important',
        'image',
        'post_type',
        'url'
    ];

    public $postTypes = [
        'Bài viết' => 0,
        'Mega story' => 1,
        'Video' => 2,
        'Postcard' => 3,
        'Tài liệu' => 4,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function getPostTypeAttribute($value)
    {
        return array_search($value, $this->postTypes);
    }
}
