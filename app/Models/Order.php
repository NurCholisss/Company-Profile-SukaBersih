<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'payment_method',
        'total_price', 'items', 'payment_proof', 'status',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}


