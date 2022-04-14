<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'number',
        'floor',
        'price_per_day',
        'rooms_number',
        'images'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*public function setImagesAttribute($images)
    {
        $this->attributes['images'] = json_encode($images);
    }*/
}
