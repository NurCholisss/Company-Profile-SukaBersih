@extends('layouts.app')

@section('title', 'Hasil Pencarian - Suka Bersih')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Hasil Pencarian untuk "{{ $query }}"</h1>
        <p class="text-gray-600">{{ $products->total() }} hasil ditemukan</p>
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <a href="{{ route('products.show', $product) }}" class="block">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                    </a>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-900 mb-1">{{ $product->name }}</h3>
                        <p class="text-blue-600 font-bold text-lg mb-3">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product) }}" 
                           class="text-blue-600 hover:text-blue-800 font-medium text-sm inline-flex items-center">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm p-8 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <h3 class="text-lg font-medium text-gray-500 mt-4">Produk tidak ditemukan</h3>
            <p class="text-gray-400 mt-2">Coba dengan kata kunci yang berbeda</p>
        </div>
    @endif
</div>
@endsection