<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    'name', 'email', 'phone', 'address',
    'booking_date', 'laptop_brand', 'laptop_type',
    'service_type', 'notes',
    ];
    protected $casts = [
        'booking_date' => 'date',
];

}

