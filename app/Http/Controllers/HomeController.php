<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Gallery;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->take(4)->get();
        $galleries = Gallery::latest()->take(6)->get();
        
        return view('home', compact('products', 'galleries'));
    }
}