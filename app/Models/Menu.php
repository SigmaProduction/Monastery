<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'image'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(MenuImage::class);
    }
}
