<div x-data="{ open: false }" class="sm:relative">
    <!-- Tombol Toggle Sidebar (Mobile) -->
    <div class="sm:hidden p-4 bg-white shadow">
        <button @click="open = true" class="text-gray-900 mt-2.5">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Overlay (Mobile) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 sm:hidden" x-show="open" x-transition @click="open = false">
    </div>

    <!-- Sidebar -->
    <aside
        class="fixed sm:static top-0 left-0 w-64 h-full bg-white shadow-md z-50 transform transition-transform duration-300 ease-in-out
        sm:translate-x-0"
        :class="{ '-translate-x-full': !open, 'translate-x-0': open }">
        <div class="h-full p-4">
            <!-- Header (Mobile) -->
            <div class="flex justify-between items-center mb-6 sm:hidden">
                <h2 class="text-xl font-semibold">{{ config('app.name', 'Laravel') }}</h2>
                <button @click="open = false" class="text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Header (Desktop) -->
            <h2 class="text-xl font-semibold mb-6 hidden sm:block">{{ config('app.name', 'Laravel') }}</h2>

            <!-- Menu -->
            <nav class="space-y-2">
                <div class="block px-3 text-sm leading-4 font-medium rounded-md text-gray-500">{{ Auth::user()->role }}
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @auth
                            @if (auth()->user()->role === 'Admin')
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            @endif
                        @endauth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200"><i
                        class="bi bi-house me-1">
                    </i> Beranda</a>
                <a href="{{ route('achievements.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200"><i
                        class="bi bi-award me-1">
                    </i> Prestasi</a>

                @auth
                    @if (auth()->user()->role === 'Admin')
                        <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">
                            <i class="bi bi-people me-1"></i> Pengguna
                        </a>
                    @endif
                @endauth
            </nav>
        </div>
    </aside>
</div>
