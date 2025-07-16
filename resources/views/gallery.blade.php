@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('title', 'Galeri - Suka Bersih') {{-- Judul tab browser --}}

@section('content')
<!-- Bagian Galeri -->
<section class="py-12 md:py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="container mx-auto px-4 sm:px-6">

        <!-- Judul Galeri -->
        <div class="text-center mb-8 md:mb-12">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">
                Galeri <span class="text-blue-600">Kami</span>
            </h1>
            <div class="w-16 sm:w-20 h-1 sm:h-1.5 bg-blue-600 mx-auto mb-4 sm:mb-6"></div>
            <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto px-4 sm:px-0">
                Lihat dokumentasi lengkap aktivitas dan produk kami sebagai bagian dari upaya menjaga kebersihan.
            </p>
        </div>

        <!-- Grid Galeri -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
            @foreach($galleries as $gallery)
            <div class="group relative overflow-hidden rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                {{-- Gambar galeri --}}
                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                    class="w-full h-48 sm:h-56 md:h-64 lg:h-72 object-cover transition-transform duration-500 group-hover:scale-110">

                {{-- Overlay saat hover --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4 sm:p-6">
                    <h3 class="text-white font-semibold text-sm sm:text-base md:text-lg mb-1 transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                        {{ $gallery->title }}
                    </h3>
                    <p class="text-blue-100 text-xs sm:text-sm transform translate-y-4 group-hover:translate-y-0 transition duration-300 delay-75">
                        Klik untuk memperbesar
                    </p>
                </div>

                {{-- Link ke lightbox --}}
                <a href="{{ $gallery->image_url }}" class="absolute inset-0" data-lightbox="gallery" data-title="{{ $gallery->title }}"></a>
            </div>
            @endforeach
        </div>

        {{-- Navigasi halaman --}}
        <div class="mt-8 sm:mt-12">
            {{ $galleries->links('vendor.pagination.tailwind') }}
        </div>

    </div>
</section>
@endsection
