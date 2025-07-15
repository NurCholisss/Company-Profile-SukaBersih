<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Kolom yang disembunyikan saat data dikembalikan dalam bentuk array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Konversi kolom ke tipe data yang diinginkan
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Fungsi untuk memeriksa apakah pengguna adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}