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
        'menu_id',
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
        'pdf_post' => 4,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
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

    public $postTypeTranslations = [
        'default_post' => 'Bài viết',
        'mega_post' => 'Mega story',
        'video_post' => 'Video',
        'postcard_post' => 'Postcard',
        'pdf_post' => 'PDF',
    ];

    public function getTranslatedPostType()
    {
        return $this->postTypeTranslations[$this->post_type] ?? null;
    }
}
