<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer'; // Specify the table name if it differs from the model name
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'booking_date',
        'city',
    ];
    protected $casts = [
        'booking_date' => 'datetime', // Assuming booking_date is a date field
    ];
    // Define any relationships, scopes, or additional methods her
}

