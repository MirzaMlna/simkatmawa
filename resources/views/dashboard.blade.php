<x-app-layout>
    <div class="p-6 md:p-8 space-y-8">
        <!-- Welcome Section -->
        <div class="bg-blue-600 rounded-3xl p-8 md:p-10 shadow-xl border border-blue-500">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-blue-700 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="bi bi-person-circle text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-1">Selamat Datang!</h1>
                            <p class="text-blue-100 text-lg font-semibold">{{ $user->name }}</p>
                        </div>
                    </div>
                    <p class="text-white text-base md:text-lg leading-relaxed max-w-2xl font-medium">
                        Kelola prestasi akademik Anda dengan mudah dan efisien melalui sistem informasi kemahasiswaan
                        yang modern
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <div
                        class="w-20 h-20 md:w-24 md:h-24 bg-blue-700 rounded-3xl flex items-center justify-center shadow-xl">
                        <i class="bi bi-trophy text-3xl md:text-4xl text-yellow-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        @if ($user->role == 'Admin')
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Achievements -->
                <div
                    class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <p class="text-sm font-semibold text-blue-800 uppercase tracking-wide">Total Prestasi
                                </p>
                            </div>
                            <p class="text-3xl md:text-4xl font-bold text-blue-900 mb-1">
                                {{ \App\Models\Achievement::count() }}</p>
                            <p class="text-blue-700 text-sm font-medium">Total pencapaian</p>
                        </div>
                        <div
                            class="w-14 h-14 bg-blue-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="bi bi-trophy text-2xl text-white"></i>
                        </div>
                    </div>
                </div>

                <!-- Pending Achievements -->
                <div
                    class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                                <p class="text-sm font-semibold text-orange-800 uppercase tracking-wide">Menunggu
                                    Verifikasi</p>
                            </div>
                            <p class="text-3xl md:text-4xl font-bold text-orange-900 mb-1">
                                {{ \App\Models\Achievement::where('status', 'Tunda')->count() }}</p>
                            <p class="text-orange-700 text-sm font-medium">Dalam proses review</p>
                        </div>
                        <div
                            class="w-14 h-14 bg-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="bi bi-clock text-2xl text-white"></i>
                        </div>
                    </div>
                </div>

                <!-- Verified Achievements -->
                <div
                    class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <p class="text-sm font-semibold text-green-800 uppercase tracking-wide">Terverifikasi
                                </p>
                            </div>
                            <p class="text-3xl md:text-4xl font-bold text-green-900 mb-1">
                                {{ \App\Models\Achievement::where('status', 'Diterima')->count() }}</p>
                            <p class="text-green-700 text-sm font-medium">Sudah disetujui</p>
                        </div>
                        <div
                            class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="bi bi-check-circle text-2xl text-white"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div
                    class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <p class="text-sm font-semibold text-purple-800 uppercase tracking-wide">Total Pengguna
                                </p>
                            </div>
                            <p class="text-3xl md:text-4xl font-bold text-purple-900 mb-1">
                                {{ \App\Models\User::count() }}</p>
                            <p class="text-purple-700 text-sm font-medium">Pengguna terdaftar</p>
                        </div>
                        <div
                            class="w-14 h-14 bg-purple-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="bi bi-people text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Pending Achievements -->
                <div
                    class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                                <p class="text-sm font-semibold text-orange-800 uppercase tracking-wide">Menunggu
                                    Verifikasi</p>
                            </div>
                            <p class="text-3xl md:text-4xl font-bold text-orange-900 mb-1">
                                {{ \App\Models\Achievement::where('identity_number', $user->identity_number)->where('status', 'Tunda')->count() }}
                            </p>
                            <p class="text-orange-700 text-sm font-medium">Dalam proses review</p>
                        </div>
                        <div
                            class="w-14 h-14 bg-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="bi bi-clock text-2xl text-white"></i>
                        </div>
                    </div>
                </div>

                <!-- Verified Achievements -->
                <div
                    class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <p class="text-sm font-semibold text-green-800 uppercase tracking-wide">Terverifikasi
                                </p>
                            </div>
                            <p class="text-3xl md:text-4xl font-bold text-green-900 mb-1">
                                {{ \App\Models\Achievement::where('identity_number', $user->identity_number)->where('status', 'Diterima')->count() }}
                            </p>
                            <p class="text-green-700 text-sm font-medium">Sudah disetujui</p>
                        </div>
                        <div
                            class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="bi bi-check-circle text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- User Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-xl">
                    <div class="bg-blue-600 p-8">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <div
                                    class="w-20 h-20 bg-blue-700 rounded-3xl flex items-center justify-center shadow-xl">
                                    <span
                                        class="text-white font-bold text-3xl">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                                    <i class="bi bi-check text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="text-white flex-1">
                                <h3 class="font-bold text-2xl mb-1">{{ $user->name }}</h3>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-700 border border-blue-500">
                                        <i
                                            class="bi {{ $user->role === 'admin' ? 'bi-shield-check' : 'bi-person-circle' }} mr-1.5"></i>
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative p-8 space-y-6">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center">
                                    <i class="bi bi-envelope text-blue-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">NPM/NIDN
                                    </p>
                                    <p class="text-gray-900 font-semibold truncate">
                                        {{ $user->identity_number ?? 'Belum diisi' }}</p>
                                </div>
                            </div>

                            @if ($user->role == 'mahasiswa')
                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                    <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center">
                                        <i class="bi bi-person-badge text-green-600 text-lg"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">NIM
                                        </p>
                                        <p class="text-gray-900 font-semibold">
                                            {{ $user->identity_number ?? 'Belum diisi' }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                    <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center">
                                        <i class="bi bi-mortarboard text-purple-600 text-lg"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">
                                            Program Studi</p>
                                        <p class="text-gray-900 font-semibold">
                                            {{ $user->study_program ?? 'Belum diisi' }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                    <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center">
                                        <i class="bi bi-phone text-orange-600 text-lg"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">
                                            Telepon</p>
                                        <p class="text-gray-900 font-semibold">{{ $user->phone ?? 'Belum diisi' }}</p>
                                    </div>
                                </div>
                            @elseif($user->role == 'dosen')
                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                    <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center">
                                        <i class="bi bi-person-badge text-green-600 text-lg"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">NUPTK
                                        </p>
                                        <p class="text-gray-900 font-semibold">
                                            {{ $user->identity_number ?? 'Belum diisi' }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                                    <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center">
                                        <i class="bi bi-mortarboard text-purple-600 text-lg"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-medium text-gray-600 uppercase tracking-wide mb-1">
                                            Program Studi</p>
                                        <p class="text-gray-900 font-semibold">
                                            {{ $user->study_program ?? 'Belum diisi' }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="{{ route('profile.edit') }}"
                                    class="group flex-1 inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i
                                        class="bi bi-pencil mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                    <span>Edit Profile</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                                    @csrf
                                    <button type="submit"
                                        class="group w-full inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl">
                                        <i
                                            class="bi bi-box-arrow-right mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutorial Section -->
            <div class="lg:col-span-2">
                <div class="bg-white border border-green-200 rounded-3xl shadow-xl">
                    <div class="bg-green-600 p-8">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-green-700 rounded-3xl flex items-center justify-center shadow-xl">
                                <i class="bi bi-lightbulb text-3xl text-yellow-300"></i>
                            </div>
                            <div class="text-white">
                                <h3 class="text-2xl font-bold mb-2">Tutorial Upload Prestasi</h3>
                                <p class="text-green-100 text-lg">Ikuti langkah-langkah berikut untuk mengunggah
                                    prestasi Anda</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative p-8">
                        <div class="space-y-8">
                            <div
                                class="group flex items-start space-x-6 p-6 bg-white border border-gray-200 rounded-3xl hover:shadow-lg transition-all duration-300">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-blue-600 rounded-full mt-2 group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <div class="flex-1">
                                    <h4
                                        class="font-bold text-xl text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
                                        Siapkan berkas yang diperlukan</h4>
                                    <p class="text-gray-600 leading-relaxed mb-4">Berkas yang diperlukan sebagai
                                        berikut:</p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div
                                            class="flex items-center space-x-3 p-3 bg-blue-50 rounded-xl border border-blue-200/50">
                                            <i class="bi bi-link-45deg text-blue-600"></i>
                                            <span class="text-sm font-medium text-gray-700">Link berita</span>
                                        </div>
                                        <div
                                            class="flex items-center space-x-3 p-3 bg-red-50 rounded-xl border border-red-200/50">
                                            <i class="bi bi-file-earmark-pdf text-red-600"></i>
                                            <span class="text-sm font-medium text-gray-700">Sertifikat (PDF, Max
                                                5MB)</span>
                                        </div>
                                        <div
                                            class="flex items-center space-x-3 p-3 bg-green-50 rounded-xl border border-green-200/50">
                                            <i class="bi bi-camera text-green-600"></i>
                                            <span class="text-sm font-medium text-gray-700">Foto penyerahan (PDF, Max
                                                5MB)</span>
                                        </div>
                                        <div
                                            class="flex items-center space-x-3 p-3 bg-purple-50 rounded-xl border border-purple-200/50">
                                            <i class="bi bi-file-text text-purple-600"></i>
                                            <span class="text-sm font-medium text-gray-700">Surat tugas (PDF, Max
                                                5MB)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="group flex items-start space-x-6 p-6 bg-white border border-gray-200 rounded-3xl hover:shadow-lg transition-all duration-300">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-green-600 rounded-full mt-2 group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <div class="flex-1">
                                    <h4
                                        class="font-bold text-xl text-gray-900 mb-3 group-hover:text-green-600 transition-colors duration-300">
                                        Klik Tombol "Upload Prestasi"</h4>
                                    <p class="text-gray-600 leading-relaxed">Tombol ini bisa kamu temukan di atas atau
                                        pada menu navigasi. Pastikan semua berkas sudah siap sebelum memulai.</p>
                                </div>
                            </div>

                            <div
                                class="group flex items-start space-x-6 p-6 bg-white border border-gray-200 rounded-3xl hover:shadow-lg transition-all duration-300">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-orange-600 rounded-full mt-2 group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <div class="flex-1">
                                    <h4
                                        class="font-bold text-xl text-gray-900 mb-3 group-hover:text-orange-600 transition-colors duration-300">
                                        Simpan dan Tunggu Verifikasi</h4>
                                    <p class="text-gray-600 leading-relaxed">Setelah formulir lengkap, klik "Simpan".
                                        Prestasimu akan dicek oleh admin sebelum ditampilkan di sistem.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 pt-8 border-t border-gray-200/50">
                            <div
                                class="bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200/50 text-amber-800 p-6 rounded-2xl mb-8 shadow-sm">
                                <div class="flex items-start space-x-3">
                                    <i class="bi bi-info-circle text-amber-600 text-xl mt-0.5"></i>
                                    <div>
                                        <h5 class="font-bold mb-2">Catatan Penting:</h5>
                                        <p class="leading-relaxed">Jika berkas belum lengkap, kamu bisa melengkapinya
                                            nanti. Namun, data belum akan dikirim ke admin hingga semua berkas lengkap.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('achievements.create') }}"
                                    class="group flex-1 inline-flex items-center justify-center space-x-3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                    <i
                                        class="bi bi-plus-circle text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                    <span>Tambah Prestasi Baru</span>
                                </a>
                                <a href="{{ route('achievements.index') }}"
                                    class="group flex-1 inline-flex items-center justify-center space-x-3 bg-gray-600 hover:bg-gray-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                    <i
                                        class="bi bi-list-ul text-xl group-hover:scale-110 transition-transform duration-300"></i>
                                    <span>Lihat Prestasi</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Admin Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-purple-600 p-6">
                <h3 class="text-xl font-bold text-white flex items-center space-x-2">
                    <i class="bi bi-headset"></i>
                    <span>Hubungi Admin</span>
                </h3>
                <p class="text-purple-100 mt-2">Jika mengalami kendala saat mengunggah prestasi, hubungi admin</p>
            </div>
            <div class="p-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <p class="text-sm text-gray-500">WhatsApp</p>
                        <p class="font-medium text-gray-900">+62 852-5900-4449</p>
                    </div>
                    <a href="https://wa.me/6285259004449" target="_blank"
                        class="inline-flex items-center space-x-2 bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 w-full sm:w-auto justify-center">
                        <i class="bi bi-whatsapp"></i>
                        <span>Chat via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
