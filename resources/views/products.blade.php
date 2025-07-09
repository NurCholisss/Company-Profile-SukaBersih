@extends('layouts.app')

@section('title', 'Produk - Suka Bersih')

@section('content')
<!-- Product List -->
<section class="py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Produk <span class="text-blue-600">Kami</span></h1>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Bersihkan rumah lebih mudah dan nyaman dengan produk kebersihan berkualitas tinggi dari kami—praktis, aman, dan ramah lingkungan.</p>
        </div>
        
        <!-- Horizontal Scrollable Product Grid -->
<div class="relative">
    <div class="overflow-x-auto pb-8 -mx-4 px-4 scrollbar-hide">
        <div class="flex space-x-6" style="width: calc({{ ceil(count($products)/4) }} * (100% + 1.5rem))">
            @foreach(array_chunk($products->all(), 4) as $productRow)
            <div class="grid grid-cols-4 gap-6" style="width: calc(100% - 1.5rem)">
                @foreach($productRow as $product)
                <div class="group bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <!-- Product Image -->
                    <div class="relative h-48 w-full bg-gray-100">
                        <img 
                            src="{{ $product->image_url }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-full object-contain p-4 transition duration-500 group-hover:scale-105"
                            onerror="this.src='https://via.placeholder.com/256x256?text=Produk+Tidak+Tersedia'"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                        <div class="absolute top-3 right-3">
                        </div>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 truncate">{{ $product->name }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-700 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <a href="{{ route('products.show', $product) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                                Detail
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Scroll indicators (optional) -->
    <div class="flex justify-center mt-4 space-x-2">
        @for($i = 0; $i < ceil(count($products)/4); $i++)
        <button class="w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-600 transition-colors scroll-indicator" data-index="{{ $i }}"></button>
        @endfor
    </div>
</div>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="p-6 bg-blue-50 rounded-xl text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Kualitas Terjamin</h3>
                <p class="text-gray-600 text-sm">Produk kami melalui proses quality control yang ketat.</p>
            </div>
            <div class="p-6 bg-blue-50 rounded-xl text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2zm0 8c-1.657 0-3-.895-3-2s1.343-2 3-2 3 .895 3 2-1.343 2-3 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Ramah Lingkungan</h3>
                <p class="text-gray-600 text-sm">Bahan-bahan yang digunakan aman untuk lingkungan.</p>
            </div>
            <div class="p-6 bg-blue-50 rounded-xl text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600 text-sm">Kualitas premium dengan harga yang kompetitif.</p>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hide scrollbar but keep functionality */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection