<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(8);
        return view('products', compact('products'));
    }

    public function show(Product $product): View
    {
        // Ambil 4 produk lain secara acak, kecuali produk yang sedang ditampilkan
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
