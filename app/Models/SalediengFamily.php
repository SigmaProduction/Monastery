<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalediengFamily extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'subname',
        'birth_date',
        'death_date',
        'description',
        'saledieng_month_id'
    ];

    public function saledieng_month()
    {
        return $this->belongsTo(SalediengMonth::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
