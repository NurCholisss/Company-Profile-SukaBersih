<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Menampilkan daftar semua produk
    public function index(): View
    {
        $products = Product::latest()->paginate(8); // Tampilkan 8 produk per halaman
        return view('products', compact('products'));
    }

    // Menampilkan detail satu produk tertentu
    public function show(Product $product): View
    {
        // Ambil 4 produk acak yang berbeda dari produk yang sedang ditampilkan
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
