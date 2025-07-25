<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function destroy($id)
    {
        $contact = Order::findOrFail($id); // Cari pesan, jika tidak ditemukan akan error 404
        $contact->delete(); // Hapus pesan

        return redirect()->route('admin.orders.index')
            ->with('success', 'order berhasil dihapus');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

}
