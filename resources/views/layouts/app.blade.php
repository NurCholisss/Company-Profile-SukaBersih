<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Suka Bersih') }} | @yield('title')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo/favicon.ico') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Scripts -->
    @stack('scripts')
    
    <!-- Toast Notification -->
    @if(session('success'))
    <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transition-all duration-300">
        {{ session('success') }}
    </div>
    @endif
</body>
</html>