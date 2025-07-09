<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminGalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $gallery->delete();
        
        return back()->with('success', 'Gambar berhasil dihapus!');
    }
}