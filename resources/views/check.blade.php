@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Cek Riwayat Pesanan</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">{{ session('error') }}</div>
    @endif

    <form action="{{ route('check') }}" method="POST" class="space-y-4">
        @csrf
        <input type="email" name="email" placeholder="Masukkan email Anda"
               class="w-full p-2 border border-gray-300 rounded" required>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Lihat Riwayat
        </button>
    </form>
</div>
@endsection
