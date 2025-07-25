<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Menampilkan daftar produk
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form tambah produk baru
    public function create(): View
    {
        return view('admin.products.create');
    }

    // Menyimpan data produk baru ke database dan upload gambar
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0', // ✅ TAMBAHKAN INI
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated); // Simpan produk ke database

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form edit produk
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    // Memperbarui data produk
    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0', // ✅ TAMBAHKAN INI
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $validated['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($validated); // ✅ Ini akan menyimpan stock juga

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
}


    // Menghapus produk dan gambar terkait
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }
}
