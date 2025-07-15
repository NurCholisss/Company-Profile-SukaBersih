<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    // Menampilkan halaman form kontak
    public function index(): View
    {
        return view('contact');
    }

    // Menyimpan data pesan dari form kontak
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',         
            'email' => 'required|email|max:255',         
            'subject' => 'required|string|max:255',      
            'message' => 'required|string',              
        ]);

        // Simpan ke dalam tabel 'messages'
        Message::create($validated);

        // Redirect kembali ke halaman form dengan pesan sukses
        return back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
