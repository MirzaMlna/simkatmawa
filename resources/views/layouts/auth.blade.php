<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIMKATMAWA') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-blue-50 to-gray-100 min-h-screen">
    <div class="min-h-screen flex flex-col justify-center py-6 sm:py-12 px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6 sm:mb-10">
            <a href="/">
                <img src="{{ asset('images/uniska_logo.webp') }}" alt="UNISKA Logo" class="w-20 h-20 sm:w-24 sm:h-24 object-contain">
            </a>
            <h1 class="mt-4 text-xl sm:text-2xl font-bold text-gray-900 text-center">SIMKATMAWA</h1>
            <p class="mt-2 text-center text-sm text-gray-600">
                Sistem Informasi Kemahasiswaan UNISKA
            </p>
        </div>

        <!-- Form Container -->
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white py-8 px-6 sm:px-8 shadow-xl rounded-2xl border border-gray-200">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    © {{ date('Y') }} UNISKA. Semua Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </div>
</body>
</html>