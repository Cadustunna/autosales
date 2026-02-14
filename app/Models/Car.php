<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'make', 'model', 'year', 'price',
        'condition', 'mileage', 'transmission', 'fuel_type',
        'body_type', 'exterior_color', 'interior_color', 'doors',
        'seats', 'engine_size', 'description', 'vin', 'location',
        'status', 'is_featured', 'views', 'softDeletes'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'year' => 'integer',
        'mileage' => 'integer',
        'views' => 'integer',
    ];

    //Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class)
            ->orderBy('created_at','desc');
    }

    public function primaryImage()
    {
        return $this->hasOne(CarImage::class)
            ->where('is_primary', true);
    }

    public function features()
    {
        return $this->hasMany(CarFeature::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'car_categories');
    }

    public function favorties()
    {
        return $this->hasMany(Favorite::class);
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function test_drive()
    {
        return $this->hasMany(TestDrive::class);
    }

     // Helper methods
    public function isFavorited()
    {
        return $this->favorites()->where('user_id', Auth::user()->id)->exists();
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
