<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('gallery', compact('galleries'));
    }
}