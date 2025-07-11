@extends('layouts.app')

@section('title', 'Produk - Suka Bersih')

@section('content')
<!-- Product Section -->
<section class="py-8 md:py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8 md:mb-12">
            <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                Produk <span class="text-blue-600">Kami</span>
            </h1>
            <div class="w-16 md:w-20 h-1 md:h-1.5 bg-blue-600 mx-auto mb-4 md:mb-6"></div>
            <p class="text-sm md:text-base text-gray-600 max-w-2xl mx-auto">
                Bersihkan rumah lebih mudah dan nyaman dengan produk kebersihan berkualitas tinggi dari kami—praktis, aman, dan ramah lingkungan.
            </p>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
            @foreach($products as $product)
            <div class="group bg-white rounded-lg md:rounded-xl shadow-sm hover:shadow-md md:hover:shadow-lg transition duration-300 overflow-hidden">
                <!-- Image -->
                <div class="relative aspect-square bg-gray-100">
                    <img 
                        src="{{ $product->image_url }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-contain p-3 md:p-4 transition duration-500 group-hover:scale-105"
                        onerror="this.src='https://via.placeholder.com/256x256?text=Produk+Tidak+Tersedia'"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                    @if($product->is_new)
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">BARU</div>
                    @endif
                </div>

                <!-- Info -->
                <div class="p-3 md:p-4 text-center">
                    <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-1 md:mb-2 line-clamp-1">
                        {{ $product->name }}
                    </h3>
                    <div class="flex justify-between items-center">
                        <span class="text-sm md:text-base text-blue-700 font-bold">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('products.show', $product) }}" class="text-xs md:text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                            Detail
                            <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8 md:mt-12">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>

        <!-- Features -->
        <div class="mt-12 md:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            <div class="p-4 md:p-6 bg-blue-50 rounded-lg md:rounded-xl text-center">
                <div class="w-10 h-10 md:w-14 md:h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 mb-1 md:mb-2">Kualitas Terjamin</h3>
                <p class="text-xs md:text-sm text-gray-600">Produk kami melalui proses quality control yang ketat.</p>
            </div>
            <div class="p-4 md:p-6 bg-blue-50 rounded-lg md:rounded-xl text-center">
                <div class="w-10 h-10 md:w-14 md:h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2zm0 8c-1.657 0-3-.895-3-2s1.343-2 3-2 3 .895 3 2-1.343 2-3 2z" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 mb-1 md:mb-2">Ramah Lingkungan</h3>
                <p class="text-xs md:text-sm text-gray-600">Bahan-bahan yang digunakan aman untuk lingkungan.</p>
            </div>
            <div class="p-4 md:p-6 bg-blue-50 rounded-lg md:rounded-xl text-center">
                <div class="w-10 h-10 md:w-14 md:h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 mb-1 md:mb-2">Harga Terjangkau</h3>
                <p class="text-xs md:text-sm text-gray-600">Kualitas premium dengan harga yang kompetitif.</p>
            </div>
        </div>
    </div>
</section>
@endsection