@extends('layouts.app')

@section('title', 'Tambah Produk - Suka Bersih')

@section('content')
    <div class="flex flex-col md:flex-row h-screen bg-gray-50">
        @include('admin.partials.sidebar')
        
            <main class=" flex-1 pl-[72px] <!-- Mobile: 64px sidebar + 8px jarak --> md:pl-[272px] <!-- Desktop: 256px sidebar + 16px jarak --> group-hover/sidebar:pl-[272px] transition-all duration-300 overflow-auto ">
                <!-- Header and Back Button -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8 gap-4">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Produk Baru</h1>
                        <p class="text-sm md:text-base text-gray-600">Isi form berikut untuk menambahkan produk baru</p>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="w-full md:w-auto inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                
                <!-- Product Form -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="p-4 md:p-6 grid md:grid-cols-2 gap-6 md:gap-8">
                            <!-- Left Column -->
                            <div class="space-y-4 md:space-y-6">
                                <!-- Name Field -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                                    <input type="text" id="name" name="name" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200">
                                </div>
                                
                                <!-- Price Field -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">Rp</span>
                                        </div>
                                        <input type="number" id="price" name="price" min="0" step="0.01" required class="block w-full pl-10 pr-12 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-200">
                                    </div>
                                </div>
                                
                                <!-- Image Upload -->
                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <div class="flex flex-col sm:flex-row text-sm text-gray-600 items-center justify-center">
                                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                    <span>Upload file</span>
                                                    <input id="image" name="image" type="file" required class="sr-only" onchange="previewImage(this, 'image-preview')">
                                                </label>
                                                <p class="pl-1">atau drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, JPEG (Maks. 2MB)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column -->
                            <div class="space-y-4 md:space-y-6">
                                <!-- Description Field -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                    <textarea id="description" name="description" rows="6" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200"></textarea>
                                </div>
                                
                                <!-- Image Preview -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Pratinjau Gambar</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                        <img id="image-preview" src="#" alt="Pratinjau Gambar" class="hidden max-h-48">
                                        <span id="no-image" class="text-gray-400">Gambar akan muncul di sini</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Footer -->
                        <div class="px-4 md:px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
                            <button type="submit" class="w-full md:w-auto inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-sm">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const noImage = document.getElementById('no-image');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    noImage.classList.add('hidden');
                }
                
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection