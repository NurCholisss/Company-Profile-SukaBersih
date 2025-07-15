<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    // Menampilkan halaman galeri berisi daftar gambar
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(8); // Ambil 8 gambar terbaru per halaman
        return view('gallery', compact('galleries'));
    }
}
