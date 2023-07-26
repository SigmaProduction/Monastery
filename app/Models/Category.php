<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'meta_content', 'menu_id', 'order' ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
