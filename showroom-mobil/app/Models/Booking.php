<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'test_drive_date',
        'status',
    ];

    // Relasi: Booking dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Booking untuk satu mobil
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}