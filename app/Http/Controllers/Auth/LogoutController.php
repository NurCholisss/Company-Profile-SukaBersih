<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Proses logout pengguna
    public function logout(Request $request)
    {
        Auth::logout(); // Logout dari sistem

        $request->session()->invalidate(); // Hapus semua data session
        $request->session()->regenerateToken(); // Regenerasi CSRF token baru

        return redirect('/'); // Arahkan ke halaman utama
    }
}
