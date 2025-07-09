<header class="bg-white shadow-sm sticky top-0 z-50 backdrop-blur-sm bg-white/90">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="ml-2 text-xl font-bold text-gray-900">Suka<span class="text-blue-600">Bersih</span></span>
                </div>
            </a>

            <!-- Search Bar - Desktop -->
            <div class="hidden md:flex mx-4 flex-1 max-w-md">
                <form action="{{ route('search') }}" method="GET" class="w-full">
                    <div class="relative">
                        <input type="text" name="q" placeholder="Cari produk..." 
                            class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            value="{{ request('q') }}">
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('home') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Beranda</a>
                <a href="{{ route('products') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('products*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Produk</a>
                <a href="{{ route('gallery') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('gallery') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Galeri</a>
                <a href="{{ route('contact') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{ request()->routeIs('contact') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Kontak</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 bg-blue-600 text-white hover:bg-blue-700 ml-2">
                        Dashboard
                    </a>
                @endauth
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <!-- Mobile Search -->
        <div class="px-4 py-3">
            <form action="{{ route('search') }}" method="GET" class="w-full">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari produk..." 
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        value="{{ request('q') }}">
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        
        <div class="container mx-auto px-4 py-2 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Beranda</a>
            <a href="{{ route('products') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('products*') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Produk</a>
            <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('gallery') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Galeri</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">Kontak</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>

<style>
    .backdrop-blur-sm {
        backdrop-filter: blur(8px);
    }
</style>