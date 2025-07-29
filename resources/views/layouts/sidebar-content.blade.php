<div class="flex flex-col h-full p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <img src="{{ asset('images/uniska_logo.webp') }}" alt="UNISKA Logo" class="w-8 h-8 object-contain">
                </div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900">SIMKATMAWA</h2>
                <p class="text-xs text-gray-600 font-semibold">UNISKA MAB</p>
            </div>
        </div>
        <!-- Mobile Close Button -->
        <button 
            @click="sidebarOpen = false" 
            class="lg:hidden p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100/80 transition-all duration-200"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- User Profile Card -->
    <div class="bg-gray-50 rounded-2xl p-4 shadow-lg border border-gray-200 mb-6">
        <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="font-bold text-gray-900 truncate text-sm">{{ Auth::user()->name }}</h3>
                <div class="flex items-center space-x-2 mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-600 text-white border border-blue-500">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="mt-4 pt-4 border-t border-gray-200">
            <div class="flex items-center justify-between space-x-2">
                <a href="{{ route('profile.edit') }}" class="group flex items-center justify-center space-x-2 px-3 py-2.5 text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md border border-gray-300">
                    <i class="bi bi-person-gear text-blue-600 group-hover:scale-110 transition-transform duration-200"></i>
                    <span>Profile</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="contents">
                    @csrf
                    <button type="submit" class="group flex items-center justify-center space-x-2 px-3 py-2.5 text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md border border-gray-300">
                        <i class="bi bi-box-arrow-right text-red-600 group-hover:scale-110 transition-transform duration-200"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 space-y-2">
        <div class="text-xs font-bold text-gray-500 uppercase tracking-wider px-4 mb-4">Navigation</div>
        
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
            <div class="flex items-center justify-center w-10 h-10 rounded-full {{ request()->routeIs('dashboard') ? 'bg-blue-700 shadow-lg' : 'bg-gray-100 group-hover:bg-blue-100 group-hover:scale-110' }} mr-3 transition-all duration-300">
                <i class="bi bi-house-door {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-600 group-hover:text-blue-600' }} text-lg"></i>
            </div>
            <span class="flex-1 font-semibold">Beranda</span>
            @if(request()->routeIs('dashboard'))
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
            @endif
        </a>
        
        <!-- Achievements -->
        <a href="{{ route('achievements.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-300 {{ request()->routeIs('achievements.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
            <div class="flex items-center justify-center w-10 h-10 rounded-full {{ request()->routeIs('achievements.*') ? 'bg-blue-700 shadow-lg' : 'bg-gray-100 group-hover:bg-blue-100 group-hover:scale-110' }} mr-3 transition-all duration-300">
                <i class="bi bi-trophy {{ request()->routeIs('achievements.*') ? 'text-white' : 'text-gray-600 group-hover:text-blue-600' }} text-lg"></i>
            </div>
            <span class="flex-1 font-semibold">Prestasi</span>
            @if(request()->routeIs('achievements.*'))
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
            @endif
        </a>

        <!-- Users (Admin only) -->
        @auth
            @if (auth()->user()->role === 'Admin')
                <a href="{{ route('users.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-300 {{ request()->routeIs('users.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full {{ request()->routeIs('users.*') ? 'bg-blue-700 shadow-lg' : 'bg-gray-100 group-hover:bg-blue-100 group-hover:scale-110' }} mr-3 transition-all duration-300">
                        <i class="bi bi-people {{ request()->routeIs('users.*') ? 'text-white' : 'text-gray-600 group-hover:text-blue-600' }} text-lg"></i>
                    </div>
                    <span class="flex-1 font-semibold">Pengguna</span>
                    @if(request()->routeIs('users.*'))
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>
            @endif
        @endauth
    </nav>

    <!-- Footer -->
    <div class="mt-auto pt-6 border-t border-gray-200">
        <div class="flex items-center justify-center mb-3">
            <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="bi bi-mortarboard text-white text-xl"></i>
            </div>
        </div>
        <div class="text-center">
            <p class="text-xs font-semibold text-gray-800 mb-1">SIMKATMAWA</p>
            <p class="text-xs text-gray-600">© 2024 UNISKA MAB</p>
        </div>
    </div>
</div>