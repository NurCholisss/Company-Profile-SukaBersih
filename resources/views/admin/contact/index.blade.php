@extends('layouts.app')

@section('title', 'Kelola Pesan - Suka Bersih')

@section('content')
    <div class="flex h-screen bg-gray-50">
        @include('admin.partials.sidebar')
        
        <main class="ml-64 flex-1 overflow-auto">
            <div class="p-8">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Kelola Pesan</h1>
                        <p class="text-gray-600">Daftar pesan masuk dari pelanggan</p>
                    </div>
                    <div class="relative w-64">
                        <input type="text" placeholder="Cari pesan..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                
                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                
                <!-- Messages Table -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($messages as $message)
                                <tr class="{{ $message->is_read ? 'bg-white' : 'bg-blue-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <span class="text-blue-600 font-medium">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($message->subject, 60) }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($message->message, 70) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $message->created_at->format('d M Y') }}
                                        <div class="text-xs text-gray-400">{{ $message->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $message->is_read ? 'Dibaca' : 'Baru' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.contact.show', $message) }}" class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>
                                        <form action="{{ route('admin.contact.destroy', $message) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection