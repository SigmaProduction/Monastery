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
        'default_post' => 0,
        'mega_post' => 1,
        'video_post' => 2,
        'postcard_post' => 3,
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
