<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['subtitle', 'title', 'description', 'content', 'top_image', 'dream_1_image', 'dream_2_image'];

    public function images()
    {
        return $this->hasMany(AboutUsImage::class);
    }
}
