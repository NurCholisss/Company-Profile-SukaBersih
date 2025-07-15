<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Daftar kolom yang boleh diisi saat create/update
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // Casting kolom 'price' agar dibaca sebagai desimal dengan 2 angka di belakang koma
    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Accessor untuk mendapatkan URL lengkap dari gambar produk
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}