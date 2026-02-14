<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $fillable = [
        'car_id',
        'image_path',
        'order',
        'is_primary'
    ];

    protected $casts = [
        'is_primary'=> 'boolean',
        'order'=> 'integer'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
