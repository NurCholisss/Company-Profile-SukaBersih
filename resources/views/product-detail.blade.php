@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Breadcrumb Navigation -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('products') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Produk</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $product->name }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8 mb-12">
        <!-- PRODUCT IMAGE GALLERY -->
        <div class="lg:w-1/2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group relative">
                @if(isset($product->image))
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                         class="w-full h-auto max-h-[500px] object-contain transition duration-300 group-hover:scale-105">
                @else
                    <div class="w-full h-96 bg-gray-100 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                @if($product->stock <= 0)
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        HABIS
                    </div>
                @endif
            </div>
        </div>

        <!-- PRODUCT INFO -->
        <div class="lg:w-1/2">
            <div class="sticky top-4">
                <!-- Product Title and Category -->
                <div class="mb-4">
                    <span class="text-sm text-blue-600 font-medium uppercase tracking-wider">Kategori Produk</span>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-1">{{ $product->name }}</h1>
                    <div class="flex items-center mt-2">
                        <div class="flex items-center text-yellow-400">
                            <!-- Star ratings (you can replace with dynamic ratings if available) -->
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1 text-gray-600">4.8 (24 reviews)</span>
                        </div>
                    </div>
                </div>

                <!-- Price and Stock -->
                <div class="my-6 p-5 bg-blue-50 rounded-xl border border-blue-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-xs text-blue-600 mb-1 block">Harga</span>
                            <span class="text-3xl font-bold text-blue-700 block">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs text-gray-500 mb-1 block">Stok</span>
                            <span class="text-lg font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock > 0 ? $product->stock.' tersedia' : 'Stok habis' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Deskripsi Produk
                    </h3>
                    <div class="prose text-gray-600 max-w-none">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    @if($product->stock > 0)
                        <div class="flex flex-wrap gap-3">
                            <!-- WhatsApp Order Button -->
                            <a href="https://wa.me/6282325810922?text=Saya%20ingin%20memesan%20produk:%0A%0ANama:%20{{ urlencode($product->name) }}%0AHarga:%20Rp{{ number_format($product->price, 0, ',', '.') }}" 
                            class="flex-1 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md transition-all flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                Pesan via WhatsApp
                            </a>
                            
                            <!-- Product Inquiry Button -->
                            <a href="https://wa.me/6282325810922?text=Pertanyaan%20produk:%0A%0A{{ urlencode($product->name) }}" 
                            class="flex-1 px-6 py-3 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-all flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Tanya Produk
                            </a>
                        </div>

                        <!-- Direct Order Form -->
                        <form action="{{ route('order.direct', $product->id) }}" method="POST" class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            @csrf
                            <div class="flex items-center justify-between">
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                                    <div class="flex items-center border rounded-md overflow-hidden">
                                        <button type="button" onclick="decrementQuantity()" class="px-3 py-1 bg-gray-200 text-gray-600 hover:bg-gray-300">
                                            -
                                        </button>
                                        <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->stock }}" 
                                               value="1" required class="w-16 text-center border-0 focus:ring-0">
                                        <button type="button" onclick="incrementQuantity()" class="px-3 py-1 bg-gray-200 text-gray-600 hover:bg-gray-300">
                                            +
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg text-center">
                            <p class="text-yellow-800">Produk ini sedang tidak tersedia. Silahkan hubungi kami untuk informasi lebih lanjut.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- RELATED PRODUCTS -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            Produk Terkait
        </h2>

        @if(!empty($relatedProducts) && $relatedProducts->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <a href="{{ route('products.show', $related->id) }}" class="block relative">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" 
                                 class="w-full h-56 object-cover transition duration-300 group-hover:scale-105" 
                                 alt="{{ $related->name }}">
                        @else
                            <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        @if($related->stock <= 0)
                            <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                HABIS
                            </div>
                        @endif
                    </a>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1 truncate">{{ $related->name }}</h3>
                        <p class="text-blue-600 font-bold mb-3">Rp{{ number_format($related->price, 0, ',', '.') }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('products.show', $related->id) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            @if($related->stock > 0)
                                <a href="https://wa.me/6282325810922?text=Saya%20ingin%20memesan%20produk:%20{{ urlencode($related->name) }}" 
                                   class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded-full hover:bg-green-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="p-8 bg-white text-center border-2 border-dashed border-gray-200 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-2 text-gray-500">Belum ada produk terkait</p>
            </div>
        @endif
    </div>
</div>
@endsection