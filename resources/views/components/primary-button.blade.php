<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 sm:px-5 sm:py-2.5 bg-blue-600 border border-transparent rounded-lg font-medium text-xs sm:text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow-md']) }}>

    {{ $slot }}
</button>
