<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'year',
        'price',
        'description',
        'image',
    ];

    // Relasi: Satu mobil bisa dibooking banyak user
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
