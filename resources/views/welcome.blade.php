<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
                
                // Close mobile menu when clicking on a link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }
        });
    </script>
</head>

<body class="h-full font-inter antialiased bg-gradient-to-b from-blue-50 to-slate-100 flex flex-col min-h-screen">
    <!-- Header/Navigation -->
    <header class="bg-white/90 backdrop-blur-sm shadow-sm border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Left side - Logo and Title -->
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="flex items-center group">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300">
                            <img src="{{ asset('images/uniska_logo.webp') }}" alt="UNISKA Logo" class="w-6 h-6 sm:w-8 sm:h-8 object-contain">
                        </div>
                        <div class="ml-2 sm:ml-3">
                            <span class="text-lg sm:text-xl font-bold text-gray-900 block">SIMKATMAWA</span>
                            <span class="text-xs text-gray-500 font-medium">UNISKA Banjarmasin</span>
                        </div>
                    </a>
                </div>
                
                <!-- Navigation Links - Desktop -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Fitur</a>
                    <a href="#tutorial" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Tutorial</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Kontak</a>
                </div>
                
                <!-- Right side - Auth Links -->
                @if (Route::has('login'))
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="group flex items-center space-x-2 px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-blue-800 transition-all text-sm font-medium hover:-translate-y-0.5 hover:shadow-lg">
                            <i class="bi bi-speedometer2 group-hover:scale-110 transition-transform duration-300"></i>
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="group flex items-center space-x-2 px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl shadow-md hover:from-blue-700 hover:to-blue-800 transition-all text-sm font-medium hover:-translate-y-0.5 hover:shadow-lg">
                            <i class="bi bi-box-arrow-in-right group-hover:scale-110 transition-transform duration-300"></i>
                            <span>Masuk</span>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="group flex items-center space-x-2 px-5 py-3 border border-gray-300 bg-white rounded-xl hover:bg-gray-50 transition-all text-sm font-medium text-gray-700 hover:-translate-y-0.5 hover:shadow-lg">
                                <i class="bi bi-person-plus group-hover:scale-110 transition-transform duration-300"></i>
                                <span>Registrasi</span>
                            </a>
                        @endif
                    @endauth
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" type="button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                @endif
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2 px-3 rounded-lg hover:bg-gray-100">Fitur</a>
                    <a href="#tutorial" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2 px-3 rounded-lg hover:bg-gray-100">Tutorial</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2 px-3 rounded-lg hover:bg-gray-100">Kontak</a>
                    
                    <div class="border-t border-gray-200 my-2 pt-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="flex items-center space-x-2 py-2 px-3 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex items-center space-x-2 py-2 px-3 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Masuk</span>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="flex items-center space-x-2 py-2 px-3 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 mt-2">
                                    <i class="bi bi-person-plus"></i>
                                    <span>Registrasi</span>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="flex-grow p-4 sm:p-6 md:p-8 space-y-8 sm:space-y-10 md:space-y-12">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 transform -skew-y-6 -translate-y-24 z-0 opacity-10"></div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-20">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                    <!-- Left Content -->
                    <div class="flex-1 text-center lg:text-left">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                            <span class="block">Dokumentasikan</span>
                            <span class="block text-blue-600">Prestasimu</span>
                        </h1>
                        
                        <p class="mt-6 text-lg md:text-xl text-gray-600 max-w-2xl mx-auto lg:mx-0">
                            Platform modern untuk mengelola dan mendokumentasikan prestasi mahasiswa UNISKA. Upload dan bagikan pencapaian akademikmu dengan mudah.
                        </p>
                        
                        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            @guest
                            <a href="{{ route('register') }}"
                                class="group inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                <i class="bi bi-trophy text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                <span>Mulai Upload Prestasi</span>
                            </a>
                            @endguest
                            <a href="{{ route('guide') }}"
                                class="group inline-flex items-center justify-center space-x-3 bg-white border-2 border-blue-200 text-blue-600 font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 hover:bg-blue-50">
                                <i class="bi bi-book text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                <span>Lihat Panduan</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Right Image/Illustration -->
                    <div class="flex-shrink-0 mt-10 lg:mt-0">
                        <div class="relative">
                            <!-- Decorative elements -->
                            <div class="absolute -top-6 -right-6 w-24 h-24 bg-yellow-400 rounded-full opacity-20 animate-pulse"></div>
                            <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-blue-400 rounded-full opacity-20 animate-pulse delay-300"></div>
                            
                            <!-- Main image/icon container -->
                            <div class="relative bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 shadow-2xl transform hover:rotate-2 transition-transform duration-300">
                                <div class="w-48 h-48 md:w-64 md:h-64 flex items-center justify-center">
                                    <i class="bi bi-trophy-fill text-7xl md:text-8xl text-yellow-300"></i>
                                </div>
                                
                                <!-- Floating badges -->
                                <div class="absolute top-0 -left-4 bg-white rounded-xl shadow-lg p-3 transform -translate-y-1/3 rotate-6">
                                    <div class="flex items-center space-x-2">
                                        <i class="bi bi-mortarboard-fill text-blue-600 text-xl"></i>
                                        <span class="font-bold text-gray-800">UNISKA</span>
                                    </div>
                                </div>
                                
                                <div class="absolute bottom-0 -right-4 bg-white rounded-xl shadow-lg p-3 transform translate-y-1/3 -rotate-6">
                                    <div class="flex items-center space-x-2">
                                        <i class="bi bi-award-fill text-green-600 text-xl"></i>
                                        <span class="font-bold text-gray-800">Prestasi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Wave separator -->
            <div class="absolute bottom-0 left-0 right-0 transform translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                    <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
        </div>
            
        <!-- Features Section -->
        <section id="features" class="bg-white py-10 sm:py-12 md:py-16 rounded-3xl shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10 sm:mb-12 md:mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Fitur Unggulan</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">SIMKATMAWA menyediakan berbagai fitur untuk memudahkan pengelolaan dan dokumentasi prestasi mahasiswa</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Upload Prestasi -->
                    <div class="group relative bg-white border-2 border-gray-100 rounded-2xl p-6 sm:p-7 md:p-8 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <!-- Decorative background element -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-full -mr-16 -mt-16 transition-all duration-500 group-hover:scale-150"></div>
                        
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="bi bi-upload text-2xl text-white"></i>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Upload Prestasi</h3>
                            <p class="text-gray-600 mb-6">Dokumentasikan prestasi akademik dan non-akademik dengan mudah dan terstruktur.</p>
                            
                            <div class="flex items-center text-blue-600 font-medium">
                                <span>Pelajari Lebih Lanjut</span>
                                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pantau Perkembangan -->
                    <div class="group relative bg-white border-2 border-gray-100 rounded-2xl p-6 sm:p-7 md:p-8 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <!-- Decorative background element -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-green-100 rounded-full -mr-16 -mt-16 transition-all duration-500 group-hover:scale-150"></div>
                        
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="bi bi-graph-up text-2xl text-white"></i>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pantau Perkembangan</h3>
                            <p class="text-gray-600 mb-6">Lihat statistik dan perkembangan prestasi mahasiswa secara real-time dengan visualisasi yang informatif.</p>
                            
                            <div class="flex items-center text-green-600 font-medium">
                                <span>Pelajari Lebih Lanjut</span>
                                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Verifikasi Terpercaya -->
                    <div class="group relative bg-white border-2 border-gray-100 rounded-2xl p-6 sm:p-7 md:p-8 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <!-- Decorative background element -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 rounded-full -mr-16 -mt-16 transition-all duration-500 group-hover:scale-150"></div>
                        
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="bi bi-shield-check text-2xl text-white"></i>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Verifikasi Terpercaya</h3>
                            <p class="text-gray-600 mb-6">Semua prestasi diverifikasi oleh admin untuk menjamin keaslian data dan meningkatkan kredibilitas.</p>
                            
                            <div class="flex items-center text-purple-600 font-medium">
                                <span>Pelajari Lebih Lanjut</span>
                                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tutorial Section -->
        <section id="tutorial" class="mt-16 relative">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-b from-white to-blue-50 rounded-3xl -z-10"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 md:py-16">
                <div class="text-center mb-10 sm:mb-12 md:mb-16">
                    <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold text-sm mb-4 shadow-md">
                        <i class="bi bi-book-half mr-2"></i>Panduan Lengkap
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Menggunakan SIMKATMAWA</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Ikuti langkah-langkah sederhana berikut untuk mendokumentasikan prestasi Anda</p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Tutorial Steps -->
                    <div class="lg:col-span-8">
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-500">
                            <!-- Header -->
                            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 sm:p-7 md:p-8 relative overflow-hidden">
                                <!-- Decorative elements -->
                                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mt-32 -mr-32 blur-3xl"></div>
                                <div class="absolute bottom-0 left-0 w-32 h-32 bg-indigo-500/20 rounded-full -mb-16 -ml-16 blur-2xl"></div>
                                
                                <div class="flex items-center space-x-4 relative z-10">
                                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-xl">
                                        <i class="bi bi-book text-white text-3xl"></i>
                                    </div>
                                    <div class="text-white">
                                        <h3 class="text-2xl font-bold mb-2">Panduan Upload Prestasi</h3>
                                        <p class="text-blue-100">Langkah-langkah mudah untuk mendokumentasikan prestasimu</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress Indicator -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-4 sm:px-5 md:px-6 py-4 sm:py-5 md:py-6 relative overflow-hidden border-b border-blue-100">
                                <div class="flex justify-between relative z-10">
                                    <div class="flex flex-col items-center">
                                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl text-white font-bold text-xl shadow-lg transform hover:scale-105 transition-all duration-300">
                                            <i class="bi bi-1-circle-fill"></i>
                                        </div>
                                        <span class="mt-3 text-blue-800 font-medium">Persiapan</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl text-white font-bold text-xl shadow-lg transform hover:scale-105 transition-all duration-300">
                                            <i class="bi bi-2-circle-fill"></i>
                                        </div>
                                        <span class="mt-3 text-green-800 font-medium">Upload</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl text-white font-bold text-xl shadow-lg transform hover:scale-105 transition-all duration-300">
                                            <i class="bi bi-3-circle-fill"></i>
                                        </div>
                                        <span class="mt-3 text-purple-800 font-medium">Verifikasi</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Steps -->
                            <div class="p-4 sm:p-6 md:p-8">
                                <div class="space-y-6 sm:space-y-7 md:space-y-8">
                                    <!-- Step 1 -->
                                    <div class="bg-blue-50/50 rounded-2xl p-4 sm:p-5 md:p-6 border border-blue-100 shadow-sm hover:shadow-md transition-all duration-300">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl text-white shadow-lg">
                                                    <i class="bi bi-file-earmark-text text-xl"></i>
                                                </div>
                                            </div>
                                            <div class="ml-5">
                                                <h3 class="text-xl font-bold text-gray-900">Siapkan berkas yang diperlukan</h3>
                                                <p class="text-gray-600 mt-2">Pastikan Anda memiliki semua dokumen berikut dalam format yang sesuai:</p>
                                                
                                                <div class="mt-5">
                                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                        <li class="flex items-center bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300">
                                                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                                <i class="bi bi-link text-blue-600"></i>
                                                            </div>
                                                            <div>
                                                                <span class="font-medium">Link berita</span>
                                                                <p class="text-xs text-gray-500 mt-1">URL valid dari sumber terpercaya</p>
                                                            </div>
                                                        </li>
                                                        <li class="flex items-center bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-red-200 transition-all duration-300">
                                                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                                <i class="bi bi-file-earmark-pdf text-red-600"></i>
                                                            </div>
                                                            <div>
                                                                <span class="font-medium">Sertifikat</span>
                                                                <p class="text-xs text-gray-500 mt-1">PDF, Maksimal 5MB</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Step 2 -->
                                     <div class="bg-green-50/50 rounded-2xl p-4 sm:p-5 md:p-6 border border-green-100 shadow-sm hover:shadow-md transition-all duration-300">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl text-white shadow-lg">
                                                    <i class="bi bi-upload text-xl"></i>
                                                </div>
                                            </div>
                                            <div class="ml-5">
                                                <h3 class="text-xl font-bold text-gray-900">Klik Tombol "Upload Prestasi"</h3>
                                                <p class="text-gray-600 mt-2">Tombol ini dapat ditemukan di dashboard utama atau pada menu navigasi.</p>
                                                
                                                <div class="mt-5 bg-white border border-green-200 rounded-xl p-4 shadow-sm">
                                                    <div class="flex items-start">
                                                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                            <i class="bi bi-lightbulb text-yellow-600"></i>
                                                        </div>
                                                        <div class="ml-4">
                                                            <h4 class="font-semibold text-gray-900">Tips Penting</h4>
                                                            <p class="text-gray-600 mt-1 text-sm">Pastikan Anda sudah login sebelum mencoba mengunggah prestasi. Jika belum memiliki akun, silakan registrasi terlebih dahulu.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Step 3 -->
                                    <div class="bg-purple-50/50 rounded-2xl p-4 sm:p-5 md:p-6 border border-purple-100 shadow-sm hover:shadow-md transition-all duration-300">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl text-white shadow-lg">
                                                    <i class="bi bi-check2-circle text-xl"></i>
                                                </div>
                                            </div>
                                            <div class="ml-5">
                                                <h3 class="text-xl font-bold text-gray-900">Tunggu Verifikasi</h3>
                                                <p class="text-gray-600 mt-2">Prestasi Anda akan diverifikasi oleh admin. Anda dapat memantau status verifikasi di dashboard.</p>
                                                
                                                <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                                                    <!-- Status: Pending -->
                                                    <div class="bg-white border border-yellow-200 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-yellow-100 mx-auto mb-3">
                                                            <i class="bi bi-hourglass-split text-yellow-600"></i>
                                                        </div>
                                                        <h4 class="font-semibold text-center text-gray-900">Pending</h4>
                                                        <p class="text-gray-500 text-sm text-center mt-2">Prestasi baru diunggah dan menunggu untuk ditinjau</p>
                                                    </div>
                                                    
                                                    <!-- Status: In Review -->
                                                    <div class="bg-white border border-blue-200 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-100 mx-auto mb-3">
                                                            <i class="bi bi-search text-blue-600"></i>
                                                        </div>
                                                        <h4 class="font-semibold text-center text-gray-900">In Review</h4>
                                                        <p class="text-gray-500 text-sm text-center mt-2">Admin sedang memeriksa kelengkapan dokumen</p>
                                                    </div>
                                                    
                                                    <!-- Status: Approved -->
                                                    <div class="bg-white border border-green-200 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-green-100 mx-auto mb-3">
                                                            <i class="bi bi-check-circle text-green-600"></i>
                                                        </div>
                                                        <h4 class="font-semibold text-center text-gray-900">Approved</h4>
                                                        <p class="text-gray-500 text-sm text-center mt-2">Prestasi telah diverifikasi dan disetujui</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                                <!-- Action buttons -->
                                <div class="mt-12 pt-8 border-t border-gray-200">
                                    <div class="flex flex-col sm:flex-row gap-4">
                                        @guest
                                        <a href="{{ route('register') }}" class="group flex-1 inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                            <i class="bi bi-plus-circle text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                            <span>Mulai Upload Prestasi</span>
                                        </a>
                                        @else
                                        <a href="{{ route('dashboard') }}" class="group flex-1 inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                            <i class="bi bi-speedometer2 text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                            <span>Dashboard</span>
                                        </a>
                                        @endguest
                                        <a href="{{ route('guide') }}" class="group flex-1 inline-flex items-center justify-center space-x-3 bg-gray-700 hover:bg-gray-800 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                            <i class="bi bi-book text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                            <span>Panduan Lengkap</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- About Card -->
                    <div class="lg:col-span-4">
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 h-full">
                            <!-- Header -->
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-8">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-xl">
                                            <img src="{{ asset('images/uniska_logo.webp') }}" alt="UNISKA Logo" class="w-10 h-10 object-contain">
                                        </div>
                                    </div>
                                    <div class="text-white">
                                        <h3 class="font-bold text-2xl mb-1">SIMKATMAWA</h3>
                                        <div class="flex items-center space-x-2">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-500/30 backdrop-blur-sm border border-blue-400/30">
                                                <i class="bi bi-mortarboard mr-1.5"></i>
                                                UNISKA MAB
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-8 space-y-6">
                                <!-- About section -->
                                <div class="space-y-4">
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center">
                                            <i class="bi bi-info-circle text-blue-600 text-lg"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">Tentang</p>
                                            <p class="text-gray-900 font-semibold">Sistem Informasi Kemahasiswaan UNISKA</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Stats -->
                                <div class="space-y-4">
                                    <h4 class="font-semibold text-gray-900">Statistik Platform</h4>
                                    
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                                            <div class="text-2xl font-bold text-blue-700">{{ $achievementCount }}{{ $achievementCount > 0 ? '+' : '' }}</div>
                                            <div class="text-sm text-gray-600">Prestasi Tercatat</div>
                                        </div>
                                        <div class="bg-green-50 rounded-xl p-4 border border-green-100">
                                            <div class="text-2xl font-bold text-green-700">{{ $activeStudentCount }}{{ $activeStudentCount > 0 ? '+' : '' }}</div>
                                            <div class="text-sm text-gray-600">Mahasiswa Aktif</div>
                                        </div>
                                        <div class="bg-purple-50 rounded-xl p-4 border border-purple-100">
                                            <div class="text-2xl font-bold text-purple-700">{{ $achievementCategoryCount }}{{ $achievementCategoryCount > 0 ? '+' : '' }}</div>
                                            <div class="text-sm text-gray-600">Kategori Prestasi</div>
                                        </div>
                                        <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-100">
                                            <div class="text-2xl font-bold text-yellow-700">{{ $verifiedPercentage }}%</div>
                                            <div class="text-sm text-gray-600">Terverifikasi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Admin Section -->
        <section id="contact" class="mt-16 relative">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-b from-blue-50 to-indigo-50 rounded-3xl -z-10"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 md:py-16">
                <div class="text-center mb-10 sm:mb-12 md:mb-16">
                    <span class="inline-block px-4 py-2 rounded-full bg-blue-100 text-blue-800 font-semibold text-sm mb-4">Dukungan Pengguna</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Butuh Bantuan?</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Tim dukungan kami siap membantu Anda dengan pertanyaan atau kendala yang dihadapi</p>
                </div>
                
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 sm:p-7 md:p-8 relative overflow-hidden">
                        <!-- Decorative elements -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mt-32 -mr-32 blur-3xl"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-indigo-500/20 rounded-full -mb-16 -ml-16 blur-2xl"></div>
                        
                        <div class="flex items-center space-x-4 relative z-10">
                            <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-xl">
                                <i class="bi bi-headset text-3xl text-white"></i>
                            </div>
                            <div class="text-white">
                                <h3 class="text-2xl font-bold mb-2">Hubungi Admin</h3>
                                <p class="text-blue-100">Kami siap membantu Anda 24/7</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 sm:p-6 md:p-8 lg:p-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-4">Cara Menghubungi Kami</h4>
                                <p class="text-gray-600 mb-6">Jika Anda memiliki pertanyaan atau mengalami kendala dalam menggunakan sistem, silakan hubungi admin kami melalui WhatsApp.</p>
                                
                                <div class="space-y-6">
                                    <!-- WhatsApp Contact -->
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                            <i class="bi bi-whatsapp text-2xl text-white"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500 mb-1">WhatsApp Admin</p>
                                            <p class="text-lg font-semibold text-gray-900">+62 852-5900-4449</p>
                                            <p class="text-sm text-gray-500 mt-1">Respon cepat, 08:00 - 16:00 WIB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                                <h4 class="text-xl font-bold text-gray-900 mb-4">Hubungi Langsung</h4>
                                <p class="text-gray-600 mb-6">Pilih metode kontak yang paling nyaman untuk Anda:</p>
                                
                                <div class="space-y-4">
                                    <a href="https://wa.me/6285259004449" target="_blank" class="group flex items-center justify-center space-x-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 w-full">
                                        <i class="bi bi-whatsapp text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                        <span>Chat via WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- Footer -->
    <footer class="mt-16 py-12 bg-gray-900 text-white rounded-t-3xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Logo & About -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('images/uniska_logo.webp') }}" alt="UNISKA Logo" class="w-10 h-10 object-contain">
                        <div>
                            <h3 class="font-bold text-xl text-white">SIMKATMAWA</h3>
                            <p class="text-gray-400 text-sm">UNISKA Banjarmasin</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">Sistem Informasi Kemahasiswaan untuk dokumentasi dan verifikasi prestasi mahasiswa UNISKA Banjarmasin.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Beranda</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors duration-300">Fitur</a></li>
                        <li><a href="#tutorial" class="text-gray-400 hover:text-white transition-colors duration-300">Tutorial</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors duration-300">Kontak</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors duration-300">Login</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Informasi Kontak</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <i class="bi bi-geo-alt text-gray-400 mt-1"></i>
                            <span class="text-gray-400">Jl. Adhyaksa No.2, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="bi bi-envelope text-gray-400"></i>
                            <span class="text-gray-400">info@uniska-bjm.ac.id</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="bi bi-telephone text-gray-400"></i>
                            <span class="text-gray-400">+62 852-5900-4449</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} SIMKATMAWA - UNISKA Banjarmasin. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-400 hover:text-white transition-all duration-300">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-pink-600 hover:text-white transition-all duration-300">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
