<aside class="w-64 min-h-screen bg-gradient-to-b from-blue-800 to-blue-900 text-white fixed shadow-lg transform transition-all duration-300 ease-in-out z-50">
    <!-- Navigation Menu -->
    <nav class="mt-6 px-4 space-y-1">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                  {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white shadow-md' : 'text-blue-100 hover:bg-blue-700 hover:bg-opacity-50 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="transition-all duration-200 group-hover:font-medium">Dashboard</span>
        </a>
        
        <a href="{{ route('admin.products.index') }}" 
           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                  {{ request()->routeIs('admin.products*') ? 'bg-blue-700 text-white shadow-md' : 'text-blue-100 hover:bg-blue-700 hover:bg-opacity-50 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="transition-all duration-200 group-hover:font-medium">Produk</span>
        </a>
        
        <a href="{{ route('admin.gallery.index') }}" 
           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                  {{ request()->routeIs('admin.gallery*') ? 'bg-blue-700 text-white shadow-md' : 'text-blue-100 hover:bg-blue-700 hover:bg-opacity-50 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="transition-all duration-200 group-hover:font-medium">Galeri</span>
        </a>
        
        <a href="{{ route('admin.contact.index') }}" 
           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                  {{ request()->routeIs('admin.contact*') ? 'bg-blue-700 text-white shadow-md' : 'text-blue-100 hover:bg-blue-700 hover:bg-opacity-50 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="transition-all duration-200 group-hover:font-medium">Pesan</span>
        </a>
        
        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-700 hover:bg-opacity-50 hover:translate-x-1 transition-all duration-200 group">
                <svg class="w-5 h-5 mr-3 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="transition-all duration-200 group-hover:font-medium">Logout</span>
            </button>
        </form>
    </nav>
</aside>