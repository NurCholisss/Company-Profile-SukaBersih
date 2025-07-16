@extends('layouts.app') {{-- Menggunakan layout default --}}

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="flex flex-col lg:flex-row gap-8 mb-12">
        <!-- GAMBAR PRODUK -->
        <div class="lg:w-1/2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group relative">
                @if(isset($product->image))
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full max-h-[500px] object-contain transition group-hover:scale-105">
                @else
                    <div class="w-full h-96 bg-gray-100 flex items-center justify-center">No Image Available</div>
                @endif
            </div>
        </div>

        <!-- INFO PRODUK -->
        <div class="lg:w-1/2">
            <div class="sticky top-4">
                <span class="text-sm text-blue-600 uppercase">Detail Produk</span>
                <h1 class="text-4xl font-bold text-gray-900 mt-2">{{ $product->name }}</h1>

                <!-- HARGA -->
                <div class="my-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <span class="text-xs text-blue-600 mb-1">Harga</span>
                    <span class="text-3xl font-bold text-blue-700">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-3">Deskripsi Produk</h3>
                    <div class="prose text-gray-600">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- TOMBOL AJA / TINDAKAN -->
                <div class="flex flex-wrap gap-4">
                    <a href="https://wa.me/62882003101151?text=Saya%20ingin%20memesan%20produk:%0A%0ANama:%20{{ urlencode($product->name) }}%0AHarga:%20Rp{{ number_format($product->price, 0, ',', '.') }}" 
                       class="flex-1 px-6 py-4 bg-green-600 text-white font-medium rounded-xl shadow hover:bg-green-700 flex items-center justify-center">
                        Pesan via WhatsApp
                    </a>
                    <a href="https://wa.me/62882003101151?text=Pertanyaan%20produk:%0A%0A{{ urlencode($product->name) }}" 
                       class="flex-1 px-6 py-4 border border-gray-300 bg-white rounded-xl flex items-center justify-center hover:bg-blue-50">
                        Tanya Produk
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUK TERKAIT -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-center mb-8">Rekomendasi Produk</h2>

        @if(!empty($relatedProducts) && $relatedProducts->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl group">
                    <a href="{{ route('products.show', $related->id) }}">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" class="w-full h-56 object-cover group-hover:scale-105 transition" alt="{{ $related->name }}">
                        @else
                            <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </a>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-900 truncate">{{ $related->name }}</h3>
                        <p class="text-blue-600 font-bold mb-2">Rp{{ number_format($related->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $related->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Lihat Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Jika tidak ada produk terkait -->
            <div class="p-8 bg-white text-center border-2 border-dashed border-gray-200 rounded-xl">
                <p class="text-gray-400">Tidak ada produk terkait</p>
            </div>
        @endif
    </div>
</div>
@endsection
