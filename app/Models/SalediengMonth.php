<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalediengMonth extends Model
{
    use HasFactory;
    protected $fillable = [
        'month', 'content',
    ];

    public function saledieng_families()
    {
        return $this->hasMany(SalediengFamily::class);
    }
}
