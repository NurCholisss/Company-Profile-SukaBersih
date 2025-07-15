<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    // Menampilkan daftar pesan yang dikirim oleh pengguna
    public function index(): View
    {
        $messages = Message::latest()->paginate(10); // Ambil pesan terbaru dan paginate per 10
        return view('admin.contact.index', compact('messages'));
    }

    // Menampilkan detail satu pesan tertentu
    public function show(Message $message): View
    {
        return view('admin.contact.show', compact('message'));
    }

    // Menghapus pesan berdasarkan ID
    public function destroy($id)
    {
        $contact = Message::findOrFail($id); // Cari pesan, jika tidak ditemukan akan error 404
        $contact->delete(); // Hapus pesan

        return redirect()->route('admin.contact.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
