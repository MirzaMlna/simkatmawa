<div x-data="{ sidebarOpen: false }" @toggle-sidebar.window="sidebarOpen = !sidebarOpen">
    <!-- Mobile Sidebar Overlay -->
    <div 
        x-show="sidebarOpen" 
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-gray-900/80 lg:hidden" 
        @click="sidebarOpen = false"
    ></div>

    <!-- Mobile Sidebar -->
    <aside 
        x-show="sidebarOpen"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 shadow-xl lg:hidden"
        x-init="window.addEventListener('resize', () => { if (window.innerWidth >= 1024) sidebarOpen = false })"
    >
        <div class="flex flex-col h-full w-full p-4 sm:p-6 overflow-y-auto">
            @include('layouts.sidebar-content')
        </div>
    </aside>
</div>

<!-- Desktop Sidebar -->
<aside class="hidden lg:flex lg:flex-col bg-white border-r border-gray-200 h-full">
    <div class="flex flex-col h-full w-full p-4 sm:p-6 overflow-y-auto">
        @include('layouts.sidebar-content')
    </div>
</aside>
