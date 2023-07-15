<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'image_type', 'thumb'];

    public $imageTypes = [
        'default' => 1,
        'bottom' => 2,
    ];

    public function getImageTypeAttribute($value)
    {
        return array_search($value, $this->imageTypes);
    }

    public static function getImageTypes()
    {
        return (new static)->imageTypes;
    }
}
