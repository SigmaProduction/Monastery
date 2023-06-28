<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_us_id', 'image_path',
    ];

    public function aboutUs()
    {
        return $this->belongsTo(AboutUs::class);
    }
}
