<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi dari form kontak
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_at'
    ];
}