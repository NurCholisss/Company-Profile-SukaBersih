<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(10);
            
        return view('search', compact('products', 'query'));
    }
}