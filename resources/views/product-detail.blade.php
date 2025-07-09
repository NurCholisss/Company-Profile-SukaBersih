@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Product Detail Section -->
    <div class="flex flex-col lg:flex-row gap-8 mb-12">
        <!-- Product Images - Enhanced with gallery effect -->
        <div class="lg:w-1/2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden group relative">
                @if(isset($product->image))
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-auto max-h-[500px] object-contain transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                @else
                    <div class="w-full h-96 bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center rounded-2xl">
                        <span class="text-gray-400 text-lg">No Image Available</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Product Info - Enhanced with better visual hierarchy -->
        <div class="lg:w-1/2">
            <div class="sticky top-4">
                <!-- Product Header with subtle decoration -->
                <div class="mb-6 relative">
                    <div class="absolute -left-4 top-0 h-full w-1 bg-blue-500 rounded-full"></div>
                    <span class="text-sm text-blue-600 font-medium uppercase tracking-wider">Product Details</span>
                    <h1 class="text-4xl font-bold text-gray-900 mt-2 leading-tight">{{ $product->name }}</h1>
                </div>

                <!-- Price with visual emphasis -->
                <div class="mb-8 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <span class="block text-xs text-blue-600 mb-1">Price</span>
                    <span class="text-3xl font-bold text-blue-700">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                </div>

                <!-- Description with improved readability -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Product Description
                    </h3>
                    <div class="prose prose-blue max-w-none text-gray-600">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- Action Buttons with enhanced visual appeal -->
                <div class="flex flex-wrap gap-4">
                    <a href="https://wa.me/62882003101151?text=Saya%20ingin%20memesan%20produk:%0A%0ANama%20Produk:%20{{ urlencode($product->name) }}%0AHarga:%20Rp{{ number_format($product->price, 0, ',', '.') }}%0ALink:%20{{ urlencode(url()->current()) }}" 
                       target="_blank"
                       class="flex-1 px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-medium rounded-xl transition-all duration-200 flex items-center justify-center shadow-md hover:shadow-lg">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span class="text-lg">Order via WhatsApp</span>
                    </a>
                    
                    <a href="https://wa.me/62882003101151?text=Saya%20ingin%20menanyakan%20produk:%0A%0ANama%20Produk:%20{{ urlencode($product->name) }}%0AHarga:%20Rp{{ number_format($product->price, 0, ',', '.') }}%0ALink:%20{{ urlencode(url()->current()) }}%0A%0ASaya%20ingin%20menanyakan%20lebih%20lanjut%20tentang%20produk%20ini" 
                       target="_blank"
                       class="flex-1 px-6 py-4 border-2 border-gray-200 hover:border-blue-300 bg-white hover:bg-blue-50 text-gray-700 font-medium rounded-xl transition-all duration-200 flex items-center justify-center shadow-sm hover:shadow-md">
                        <svg class="w-6 h-6 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                        <span class="text-lg">Ask Questions</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products - Enhanced section -->
    <div class="mb-12">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Rekomendasi Produk</h2>
            <div class="w-20 h-1 bg-blue-500 mx-auto"></div>
        </div>

        @if(!empty($relatedProducts) && $relatedProducts->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 group">
                        <a href="{{ route('products.show', $related->id) }}" class="block relative">
                            @if($related->image)
                                <img src="{{ asset('storage/' . $related->image) }}" 
                                     alt="{{ $related->name }}" 
                                     class="w-full h-56 object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-56 bg-gradient-to-r from-gray-50 to-gray-100 flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <div class="p-5">
                            <h3 class="font-semibold text-lg text-gray-900 mb-1 truncate">{{ $related->name }}</h3>
                            <p class="text-blue-600 font-bold text-lg mb-3">Rp{{ number_format($related->price, 0, ',', '.') }}</p>
                            <a href="{{ route('products.show', $related->id) }}" 
                               class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                View Details
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm p-8 text-center border-2 border-dashed border-gray-200">
                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-500 mt-4">No related products found</h3>
                <p class="text-gray-400 mt-1">We couldn't find any similar products at this time</p>
            </div>
        @endif
    </div>
</div>
@endsection