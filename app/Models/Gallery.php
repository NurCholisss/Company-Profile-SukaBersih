<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi saat membuat atau memperbarui data
    protected $fillable = [
        'title',
        'image',
    ];

    // Accessor untuk mengambil URL gambar lengkap
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}