<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'address',
        'rooms',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
