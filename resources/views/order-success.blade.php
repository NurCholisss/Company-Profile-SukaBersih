@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Success Header -->
        <div class="bg-green-50 px-6 py-4 border-b border-green-100">
            <div class="flex items-center">
                <svg class="h-8 w-8 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-2xl font-bold text-gray-900">Pesanan Berhasil Dibuat!</h1>
            </div>
        </div>

        <div class="p-6 md:p-8">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Payment Instructions -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-3">Silakan lakukan pembayaran ke:</h2>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="font-medium">Bank BCA</span>
                    </div>
                    <div class="text-lg font-bold mb-1">1324987543267</div>
                </div>
            </div>

            <!-- Payment Proof Upload -->
            <form action="{{ route('order.upload-proof') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Pembayaran</label>
                    <div class="mt-1 flex items-center">
                        <label for="payment_proof" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Pilih File
                            </span>
                            <input id="payment_proof" name="payment_proof" type="file" accept="image/*,.pdf" required class="sr-only">
                        </label>
                        <span class="ml-3 text-sm text-gray-500">Format: JPG, PNG, atau PDF</span>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full md:w-auto px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                        Kirim Bukti Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection