@extends('layouts.app')

@section('title', 'Detail Pesan - Suka Bersih')

@section('content')
    <div class="flex flex-col md:flex-row h-screen bg-gray-50">
        
        <!-- Sidebar - Hidden on mobile by default -->
        @include('admin.partials.sidebar')
        
        <!-- Main Content -->
            <main class="flex-1 pl-16 group-hover/sidebar:pl-64 transition-all duration-300 overflow-auto">
            <div class="p-4 md:p-8 max-w-4xl mx-auto">
                <!-- Header and Back Button -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8 gap-4">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Detail Pesan</h1>
                        <p class="text-gray-600">Dari: {{ $message->name }}</p>
                    </div>
                    <a href="{{ route('admin.contact.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-sm text-sm md:text-base">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                
                <!-- Message Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Message Header -->
                    <div class="px-4 md:px-6 py-4 md:py-5 border-b border-gray-200 bg-gray-50">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-2">
                            <div>
                                <h2 class="text-lg md:text-xl font-semibold text-gray-800">{{ $message->subject }}</h2>
                                <div class="mt-2 flex flex-wrap items-center text-xs md:text-sm text-gray-500 gap-1 md:gap-0">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 mr-1 h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message->name }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 mx-1 h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                        {{ $message->email }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 mx-1 h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message->created_at->format('d M Y H:i') }}
                                    </div>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-medium {{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $message->is_read ? 'Dibaca' : 'Baru' }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Message Content -->
                    <div class="px-4 md:px-6 py-4 md:py-5">
                        <div class="prose max-w-none text-sm md:text-base">
                            {!! nl2br(e($message->message)) !!}
                        </div>
                    </div>
                    
                    <!-- Message Actions -->
                    <div class="px-4 md:px-6 py-3 md:py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                        <div class="flex space-x-2 md:space-x-3">
                            <form action="{{ route('admin.contact.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1 md:px-4 md:py-2 border border-transparent rounded-lg font-semibold text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 shadow-sm text-sm md:text-base" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-1 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection