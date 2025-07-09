<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    public function index(): View
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.contact.index', compact('messages'));
    }

    public function show(Message $message): View
    {
        return view('admin.contact.show', compact('message'));
    }

    public function destroy($id)
    {
        $contact = Message::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}