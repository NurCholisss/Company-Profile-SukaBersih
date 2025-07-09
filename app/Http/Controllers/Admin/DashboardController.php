<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $productCount = Product::count();
        $galleryCount = Gallery::count();
        $messageCount = Message::count();

        // Ambil 5 pesan terbaru
        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'productCount',
            'galleryCount',
            'messageCount',
            'recentMessages'
        ));
    }
}