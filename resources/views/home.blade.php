{{-- Menggunakan layout utama dari file layouts.app --}}
@extends('layouts.app')

{{-- Menetapkan judul halaman --}}
@section('title', 'Beranda - Suka Bersih')

{{-- Bagian konten utama halaman --}}
@section('content')

{{-- ========== HERO SECTION (Bagian Atas Halaman) ========== --}}
<section class="relative bg-gradient-to-br from-blue-600 to-teal-500 text-white overflow-hidden">
    {{-- Elemen dekoratif latar belakang animasi bentuk blob --}}
    <div class="absolute inset-0 opacity-10">
        {{-- Bola biru di kiri atas --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        {{-- Bola hijau di kanan atas --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        {{-- Bola di tengah bawah --}}
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    {{-- Konten utama hero --}}
    <div class="container mx-auto px-4 py-32 relative z-10 text-center">
        {{-- Ikon animasi --}}
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full backdrop-blur-sm mb-8 animate-bounce">
            {{-- Ikon shield dengan tanda centang --}}
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618..."></path>
            </svg>
        </div>

        {{-- Judul utama --}}
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight tracking-tight">
            Solusi Kebersihan <span class="text-yellow-300">Tanpa Kompromi</span>
        </h1>

        {{-- Deskripsi singkat --}}
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-blue-100 font-light">
            Hadir untuk memenuhi kebutuhan kebersihan rumah tangga Anda dengan produk berkualitas, aman, dan ramah lingkungan.
        </p>

        {{-- Tombol navigasi --}}
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            {{-- Tombol ke halaman produk --}}
            <a href="{{ route('products') }}" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4..."></path>
                </svg>
                Lihat Produk
            </a>
            {{-- Tombol ke halaman kontak --}}
            <a href="{{ route('contact') }}" class="px-8 py-4 border-2 border-white text-white font-semibold rounded-full hover:bg-white/20 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0..."></path>
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>

    {{-- Gelombang pemisah bagian bawah hero --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-current text-white w-full h-16">
            {{-- Tiga lapisan gelombang animasi --}}
            <path d="M0,0V46.29c47.79..." opacity=".25"></path>
            <path d="M0,0V15.81C13,36.92..." opacity=".5"></path>
            <path d="M0,0V5.63C149.93..." ></path>
        </svg>
    </div>
</section>

{{-- ========== TENTANG KAMI ========== --}}
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        {{-- Judul dan garis bawah --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih <span class="text-blue-600">Suka Bersih?</span></h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center">
            {{-- Gambar dan dekorasi bulat --}}
            <div class="relative">
                <div class="absolute -left-6 -top-6 w-32 h-32 bg-teal-100 rounded-full -z-10"></div>
                <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-blue-100 rounded-full -z-10"></div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                    <img src="{{ asset('images/about.png') }}" alt="Tentang Suka Bersih" class="w-full h-auto object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 via-transparent to-transparent flex items-end p-6">
                        <h3 class="text-white text-2xl font-bold">Tim Profesional Kami</h3>
                    </div>
                </div>
            </div>

            {{-- Visi & Misi --}}
            <div class="space-y-8">
                {{-- Visi --}}
                <div class="p-6 bg-gradient-to-r from-blue-50 to-teal-50 rounded-xl border border-blue-100">
                    <h3 class="text-2xl font-semibold text-blue-800 mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" ...></svg>
                        Visi Kami
                    </h3>
                    <p class="text-gray-700">
                        Suka Bersih hadir dengan visi menjadi pemimpin terpercaya dalam menyediakan produk kebersihan...
                    </p>
                </div>

                {{-- Misi: menggunakan @foreach untuk daftar --}}
                <div class="p-6 bg-gradient-to-r from-blue-50 to-teal-50 rounded-xl border border-blue-100">
                    <h3 class="text-2xl font-semibold text-blue-800 mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" ...></svg>
                        Misi Kami
                    </h3>
                    <ul class="space-y-3 text-gray-700">
                        {{-- Menampilkan setiap misi sebagai list --}}
                        @foreach([
                            'Menghadirkan produk kebersihan yang berkualitas tinggi dan ramah lingkungan, aman bagi keluarga dan bumi.', 
                            'Menawarkan solusi kebersihan yang inovatif dan praktis...', 
                            'Mendorong edukasi dan kesadaran masyarakat...', 
                            'Memberikan pengalaman berbelanja produk kebersihan...'
                        ] as $misi)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" ...></svg>
                            <span>{{ $misi }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== PRODUK UNGGULAN ========== --}}
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        {{-- Judul --}}
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Produk <span class="text-blue-600">Unggulan</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Temukan solusi kebersihan terbaik...</p>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto mt-4"></div>
        </div>

        {{-- Menampilkan 4 produk pertama --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products->take(4) as $product)
            <div class="group bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                {{-- Gambar produk --}}
                <div class="relative h-48 w-full bg-gray-100">
                    <img 
                        src="{{ $product->image_url }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-contain p-4 transition duration-500 group-hover:scale-105"
                        onerror="this.src='https://via.placeholder.com/256x256?text=Produk+Tidak+Tersedia'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>

                {{-- Info produk --}}
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">New</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-700 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="{{ route('products.show', $product) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                            Detail
                            <svg class="w-4 h-4" ...></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Tombol untuk ke semua produk --}}
        <div class="text-center mt-8">
            <a href="{{ route('products') }}" class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition duration-300 font-medium">
                Lihat Semua Produk
                <svg class="w-4 h-4 ml-2" ...></svg>
            </a>
        </div>
    </div>
</section>

{{-- ========== GALERI ========== --}}
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Galeri <span class="text-blue-600">Kami</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Dokumentasi produk dan layanan kami...</p>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto mt-4"></div>
        </div>

        {{-- Menampilkan 4 galeri pertama --}}
        <section class="py-16 bg-gradient-to-b from-blue-50 to-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Galeri <span class="text-blue-600">Kami</span></h2>
                    <p class="text-gray-600 mt-2">Lihat cuplikan dokumentasi aktivitas dan produk kami.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($galleries as $gallery)
                    <div class="relative group overflow-hidden rounded-xl shadow-md">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <h3 class="text-white font-semibold text-lg mb-1 transform translate-y-4 group-hover:translate-y-0 transition duration-300">{{ $gallery->title }}</h3>
                        </div>
                        <a href="{{ $gallery->image_url }}" class="absolute inset-0" data-lightbox="gallery" data-title="{{ $gallery->title }}"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


        {{-- Tombol galeri lengkap --}}
        <div class="text-center mt-8">
            <a href="{{ route('gallery') }}" class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition duration-300 font-medium">
                Lihat Galeri Lengkap
                <svg class="w-4 h-4 ml-2" ...></svg>
            </a>
        </div>
    </div>
</section>

{{-- ========== CTA (Call To Action) ========== --}}
<section class="relative py-24 bg-gradient-to-r from-blue-700 to-blue-800 text-white overflow-hidden">
    {{-- Elemen dekoratif blob --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            {{-- Konten CTA bisa ditambahkan di sini --}}
            <h2 class="text-4xl font-bold mb-6">Bersih itu Mudah, Mulai Sekarang!</h2>
            <p class="text-lg mb-8">Gabung bersama ribuan pelanggan lain yang telah merasakan manfaat dari produk Suka Bersih.</p>
            <a href="{{ route('contact') }}" class="inline-block px-8 py-4 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-100 transition-all duration-300 shadow-lg">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection
