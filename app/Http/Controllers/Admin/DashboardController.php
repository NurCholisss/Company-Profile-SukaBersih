<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\View\View;

class DashboardController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index(): View
    {
        $productCount = Product::count(); // Jumlah total produk
        $galleryCount = Gallery::count(); // Jumlah total galeri
        $messageCount = Message::count(); // Jumlah total pesan

        // Ambil 5 pesan terbaru untuk ditampilkan di dashboard
        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'productCount',
            'galleryCount',
            'messageCount',
            'recentMessages'
        ));
    }
}
