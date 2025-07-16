@extends('layouts.app')

@section('title', 'Hasil Pencarian - Suka Bersih')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Hasil Pencarian untuk: "{{ $query }}"</h1>
    <p class="text-gray-600 mb-6">{{ $products->total() }} hasil ditemukan</p>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    {{-- Gambar Produk --}}
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                    @endif

                    {{-- Info Produk --}}
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                        <p class="text-blue-600 font-bold mt-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product) }}" class="inline-block mt-4 text-sm text-blue-500 hover:underline">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Navigasi Halaman --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @else
        {{-- Jika Tidak Ada Produk --}}
        <div class="bg-white p-12 text-center rounded-lg shadow mt-8">
            <svg class="mx-auto mb-4 w-12 h-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-xl font-semibold mb-2">Produk tidak ditemukan</h3>
            <p class="text-gray-600">Coba gunakan kata kunci lain atau periksa ejaan pencarian Anda.</p>
        </div>
    @endif
</div>
@endsection
