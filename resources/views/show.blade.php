@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6">Riwayat Pesanan untuk {{ $email }}</h2>

    @if ($orders->isEmpty())
        <p class="text-gray-500">Belum ada pesanan ditemukan untuk email tersebut.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="py-3 px-4 border-b">Tanggal</th>
                        <th class="py-3 px-4 border-b">Produk</th>
                        <th class="py-3 px-4 border-b">Jumlah</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b">Bukti Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @foreach($order->items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="py-2 px-4 border-b">{{ $item['name'] }}</td>
                            <td class="py-2 px-4 border-b">{{ $item['quantity'] }}</td>
                            <td class="py-2 px-4 border-b capitalize">{{ $order->status }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($order->payment_proof)
                                    <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank" class="text-blue-500 underline">Lihat</a>
                                @else
                                    <span class="text-gray-400">Belum Upload</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
