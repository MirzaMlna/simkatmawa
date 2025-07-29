<nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-30" x-data>
    <div class="px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left side - Mobile menu button and Breadcrumb -->
            <div class="flex items-center space-x-4">
                <!-- Mobile menu button -->
                <button 
                    @click="sidebarOpen = !sidebarOpen" 
                    class="lg:hidden p-2.5 rounded-xl text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-all duration-200 shadow-sm"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Breadcrumb -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="bi bi-house text-blue-600 text-sm"></i>
                    </div>
                    <span class="text-lg font-bold text-gray-900">
                        @if(request()->routeIs('dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('achievements.*'))
                            Prestasi
                        @elseif(request()->routeIs('users.*'))
                            Pengguna
                        @elseif(request()->routeIs('profile.*'))
                            Profile
                        @else
                            Dashboard
                        @endif
                    </span>
                </div>
            </div>

            <!-- Right side - User Profile -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3 bg-gray-50 rounded-2xl px-4 py-2.5 border border-gray-200 shadow-sm">
                    <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="hidden md:block text-sm">
                        <p class="font-semibold text-gray-900 truncate max-w-32">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-600 font-semibold">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
