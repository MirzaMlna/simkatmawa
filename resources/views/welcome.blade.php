<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="flex flex-col items-center justify-center min-h-screen bg-white">
        <h1 class="text-4xl font-bold mb-6">Selamat Datang di {{ config('app.name') }}</h1>
        <div class="flex space-x-4">
            <a href="{{ route('login') }}"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                Register
            </a>
        </div>
    </div>
</body>

</html>
