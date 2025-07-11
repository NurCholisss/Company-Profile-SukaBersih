@extends('layouts.app')

@section('title', 'Beranda - Suka Bersih')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 to-teal-500 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>
    
    <div class="container mx-auto px-4 py-32 relative z-10 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full backdrop-blur-sm mb-8 animate-bounce">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
        </div>
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight tracking-tight">Solusi Kebersihan <span class="text-yellow-300">Tanpa Kompromi</span></h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-blue-100 font-light">Hadir untuk memenuhi kebutuhan kebersihan rumah tangga Anda dengan produk berkualitas, aman, dan ramah lingkungan.</p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('products') }}" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Lihat Produk
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-4 border-2 border-white text-white font-semibold rounded-full hover:bg-white/20 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
    
    <!-- Wave divider -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-current text-white w-full h-16">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
        </svg>
    </div>
</section>

<!-- Tentang Kami -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih <span class="text-blue-600">Suka Bersih?</span></h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
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
            
            <div class="space-y-8">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-teal-50 rounded-xl border border-blue-100">
                    <h3 class="text-2xl font-semibold text-blue-800 mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Visi Kami
                    </h3>
                    <p class="text-gray-700">    Suka Bersih hadir dengan visi menjadi pemimpin terpercaya dalam menyediakan produk kebersihan yang tidak hanya efektif, tetapi juga ramah lingkungan. Kami berkomitmen menciptakan Indonesia yang lebih bersih dan sehat melalui inovasi berkelanjutan, menjadikan aktivitas bersih-bersih sebagai gaya hidup cerdas dan modern di setiap rumah tangga.</p>
                </div>
                
                <div class="p-6 bg-gradient-to-r from-blue-50 to-teal-50 rounded-xl border border-blue-100">
                    <h3 class="text-2xl font-semibold text-blue-800 mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Misi Kami
                    </h3>
                    <ul class="space-y-3 text-gray-700">
                        @foreach([
                            'Menghadirkan produk kebersihan yang berkualitas tinggi dan ramah lingkungan, aman bagi keluarga dan bumi.', 
                            'Menawarkan solusi kebersihan yang inovatif dan praktis untuk menjawab kebutuhan rumah tangga modern.', 
                            'Mendorong edukasi dan kesadaran masyarakat akan pentingnya menjaga kebersihan sebagai bagian dari gaya hidup sehat.',
                            'Memberikan pengalaman berbelanja produk kebersihan yang mudah, cepat, dan memuaskan melalui layanan pelanggan terbaik.'] as $misi)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ $misi }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Produk Unggulan - Responsive Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Produk <span class="text-blue-600">Unggulan</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Temukan solusi kebersihan terbaik untuk kebutuhan rumah dan bisnis Anda.</p>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <!-- Responsive Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products->take(4) as $product)
            <div class="group bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <!-- Product Image -->
                <div class="relative h-48 w-full bg-gray-100">
                    <img 
                        src="{{ $product->image_url }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-contain p-4 transition duration-500 group-hover:scale-105"
                        onerror="this.src='https://via.placeholder.com/256x256?text=Produk+Tidak+Tersedia'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">New</span>
                    </div>
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

        <div class="text-center mt-8">
            <a href="{{ route('products') }}" class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition duration-300 font-medium">
                Lihat Semua Produk
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Galeri - Responsive Grid -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Galeri <span class="text-blue-600">Kami</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Dokumentasi produk dan layanan kami dalam berbagai aplikasi.</p>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <!-- Responsive Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($galleries as $gallery)
            <div class="relative group overflow-hidden rounded-xl shadow-md">
                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h3 class="text-white font-semibold text-lg mb-1 transform translate-y-4 group-hover:translate-y-0 transition duration-300">{{ $gallery->title }}</h3>
                    <p class="text-blue-100 text-sm transform translate-y-4 group-hover:translate-y-0 transition duration-300 delay-100">Lihat detail</p>
                </div>
                <a href="{{ $gallery->image_url }}" class="absolute inset-0" data-lightbox="gallery" data-title="{{ $gallery->title }}"></a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('gallery') }}" class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition duration-300 font-medium">
                Lihat Galeri Lengkap
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-r from-blue-700 to-blue-800 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-6">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Wujudkan Kebersihan Profesional Bersama Kami</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Percayakan standar kebersihan Anda pada tim ahli kami. Kami siap memberikan solusi cepat, inovatif, dan ramah lingkungan untuk kebutuhan rumah tangga maupun bisnis Anda.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Hubungi Kami Sekarang
                </a>
                <a href="tel:+6281234567890" class="px-8 py-4 border-2 border-white text-white font-semibold rounded-full hover:bg-white/20 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    +62 812 3456 7890
                </a>
            </div>
        </div>
    </div>
    
    <!-- Wave divider -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden transform rotate-180">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-current text-white w-full h-16">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
        </svg>
    </div>
</section>
@endsection