<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        "car_id",
        "user_id",
        "name",
        "email",
        "phone",
        "message",
        "inquiry_type",
        "status",
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
