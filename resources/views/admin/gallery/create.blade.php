@extends('layouts.app')

@section('title', 'Tambah Galeri - Suka Bersih')

@section('content')
    <div class="flex h-screen bg-gray-50">
        @include('admin.partials.sidebar')
        
        <main class="ml-64 flex-1 overflow-auto">
            <div class="p-8">
                <!-- Header and Back Button -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Tambah Gambar Baru</h1>
                        <p class="text-gray-600">Tambahkan gambar baru ke galeri</p>
                    </div>
                    <a href="{{ route('admin.gallery.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                
                <!-- Gallery Form -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="p-6 grid md:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Title Field -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul (Opsional)</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" placeholder="Judul gambar">
                                </div>
                                
                                <!-- Image Upload -->
                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
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
                            <div class="space-y-6">
                                <!-- Image Preview -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Pratinjau Gambar</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                        <img id="image-preview" src="#" alt="Pratinjau Gambar" class="hidden max-h-64">
                                        <span id="no-image" class="text-gray-400">Gambar akan muncul di sini</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-sm">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Simpan Gambar
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