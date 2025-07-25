<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $directOrder = session('direct_order');

        if (!$directOrder) {
            return redirect('/')->with('error', 'Tidak ada item untuk checkout.');
        }

        return view('checkout', ['directOrder' => $directOrder]);
    }

    public function store(Request $request)
    {
        $directOrder = session('direct_order');

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'nullable',
            'payment_method' => 'required',
        ]);

        if (!$directOrder) {
            return redirect('/')->with('error', 'Tidak ada data pemesanan.');
        }

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($directOrder['product_id']);

            if ($product->stock < $directOrder['quantity']) {
                throw new \Exception("Stok tidak cukup untuk produk: {$product->name}");
            }

            $product->decrement('stock', $directOrder['quantity']);

            $items = [[
                'product_id' => $product->id,
                'name'       => $product->name,
                'quantity'   => $directOrder['quantity'],
                'price'      => $product->price,
            ]];

            $total = $product->price * $directOrder['quantity'];

            $order = Order::create([
                'name'           => $request->name,
                'email'          => $request->email,
                'address'        => $request->address,
                'phone'          => $request->phone,
                'payment_method' => $request->payment_method,
                'total_price'    => $total,
                'items'          => $items,
                'status'         => 'Pending',
            ]);

            session()->forget('direct_order');

            DB::commit();

            return view('order-success', compact('order'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadProof(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_proof' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $order = Order::findOrFail($request->order_id);
        $path = $request->file('payment_proof')->store('payment_proofs', 'public');

        $order->update([
            'payment_proof' => $path,
            'status' => 'Menunggu Konfirmasi',
        ]);

        return back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }

    public function directOrder(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);

        if ($quantity > $product->stock) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        session()->put('direct_order', [
            'product_id' => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'quantity'   => $quantity,
        ]);

        return redirect()->route('checkout.index');
    }

    public function riwayatForm()
    {
        return view('check');
    }

    public function riwayatCheck(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $orders = Order::where('email', $request->email)->latest()->get();

        if ($orders->isEmpty()) {
            return redirect()->route('riwayat')->with('error', 'Tidak ditemukan pesanan untuk email tersebut.');
        }

        return view('show', [
            'orders' => $orders,
            'email' => $request->email,
        ]);
    }

    public function showAll()
    {
        $orders = Order::latest()->get(); // semua data order

        return view('admin.orders.show-all', compact('orders'));
    }
}
