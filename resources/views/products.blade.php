@extends('layouts.app') {{-- Menggunakan layout utama aplikasi --}}

@section('title', 'Produk - Suka Bersih') {{-- Judul halaman di browser --}}

@section('content')
<!-- SECTION: Daftar Produk -->
<section class="py-8 md:py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="text-center mb-8 md:mb-12">
            <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                Produk <span class="text-blue-600">Kami</span>
            </h1>
            <div class="w-16 md:w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p class="text-sm text-gray-600 max-w-2xl mx-auto">
                Bersihkan rumah lebih mudah dan nyaman dengan produk kebersihan berkualitas tinggi dari kami.
            </p>
        </div>

        <!-- GRID PRODUK -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
            @foreach($products as $product)
            <div class="group bg-white rounded-lg shadow-sm hover:shadow-lg transition overflow-hidden">
                
                <!-- GAMBAR PRODUK -->
                <div class="relative aspect-square bg-gray-100">
                    <img 
                        src="{{ $product->image_url }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-contain p-4 transition group-hover:scale-105"
                        onerror="this.src='https://via.placeholder.com/256x256?text=Produk+Tidak+Tersedia'">
                    @if($product->is_new)
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">BARU</div>
                    @endif
                </div>

                <!-- INFO PRODUK -->
                <div class="p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 line-clamp-1">{{ $product->name }}</h3>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-blue-700 font-bold">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-800 text-sm flex items-center gap-1">
                            Detail
                            <svg class="w-4 h-4" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="mt-12">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>

        <!-- FITUR KEUNGGULAN -->
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 bg-blue-50 rounded-xl text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Kualitas Terjamin</h3>
                <p class="text-sm text-gray-600">Produk kami melalui quality control ketat.</p>
            </div>
            <div class="p-6 bg-blue-50 rounded-xl text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Ramah Lingkungan</h3>
                <p class="text-sm text-gray-600">Bahan-bahan aman dan dapat terurai.</p>
            </div>
            <div class="p-6 bg-blue-50 rounded-xl text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Harga Terjangkau</h3>
                <p class="text-sm text-gray-600">Harga bersahabat dengan kualitas premium.</p>
            </div>
        </div>
    </div>
</section>
@endsection
