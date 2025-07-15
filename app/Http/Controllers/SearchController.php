<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    // Fungsi pencarian produk berdasarkan kata kunci
    public function index(Request $request)
    {
        $query = $request->input('q'); // Ambil input pencarian dari query string

        // Cari produk berdasarkan nama atau deskripsi yang mengandung keyword
        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(10); // Paginate hasil pencarian

        return view('search', compact('products', 'query'));
    }
}
