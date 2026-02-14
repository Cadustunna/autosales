<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestDrive extends Model
{
    protected $fillable = [
        "car_id",
        "user_id",
        "scheduled_date",
        "status",
        "note",
    ] ;

    protected $casts = [
        "scheduled_date"=> "integer",
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
