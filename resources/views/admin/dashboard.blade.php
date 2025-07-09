@extends('layouts.app')

@section('title', 'Dashboard Admin - Suka Bersih')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="flex h-screen bg-gray-50">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <main class="ml-64 flex-1 overflow-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
                    <div class="text-sm text-gray-500">
                        {{ now()->format('l, d F Y') }}
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6 flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Produk</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $productCount }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6 flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Galeri</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $galleryCount }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6 flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Pesan Masuk</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $messageCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Messages -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Pesan Terbaru</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentMessages as $message)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $message->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($message->subject, 30) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('admin.contact.show', $message) }}" class="text-blue-600 hover:text-blue-900 hover:underline">Lihat</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection