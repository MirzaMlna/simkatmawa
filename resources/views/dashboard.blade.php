<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="flex flex-col md:flex-row gap-6">
        <!-- Biodata User (Sebelah Kiri) -->
        <div class="w-full md:w-3/3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Title -->
                <div class="text-start mb-8">
                    <h1 class="text-3xl font-bold mb-2 text-gray-900">BIODATA AKUN</h1>
                </div>
                <div class="text-start mb-4">
                    <p class="text-gray-600">{{ $user->role }}</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500">Nomor Induk Mahasiswa</p>
                        <p class="font-medium text-gray-900">{{ $user->identity_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Program Studi</p>
                        <p class="font-medium text-gray-900">{{ $user->study_program }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nomor Telepon</p>
                        <p class="font-medium text-gray-900">{{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Utama (Sebelah Kanan) -->
        {{-- <div class="w-full md:w-2/3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Title -->
                    <div class="text-start mb-8">
                        <h1 class="text-3xl font-bold mb-2">DETAIL UPLOAD PRESTASI</h1>
                    </div>

                    <!-- Achievement Statistics -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h3 class="text-xl font-semibold mb-2">Total Upload</h3>
                            <p class="text-3xl font-bold">{{ $verifiedCount + $pendingCount }}</p>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg">
                            <h3 class="text-xl font-semibold mb-2">Diterima</h3>
                            <p class="text-3xl font-bold">{{ $verifiedCount }}</p>
                        </div>
                        <div class="bg-yellow-50 p-6 rounded-lg">
                            <h3 class="text-xl font-semibold mb-2">Pending</h3>
                            <p class="text-3xl font-bold">{{ $pendingCount }}</p>
                        </div>
                    </div>
                    <!-- Quick Actions -->
                    <div class="flex justify-center text-center">
                        <a href="{{ route('achievements.index') }}"
                            class="px-6 py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition items-center w-full">
                            Upload Prestasi
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Konten Utama (Sebelah Kanan) End-->
    </div>

    {{-- Konten Tutorial --}}
    <div class="w-full mt-6">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Tutorial (Kiri) -->
            <div class="w-full md:w-2/3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-start mb-4">
                            <h2 class="text-2xl font-bold mb-2">PANDUAN UPLOAD PRESTASI</h2>
                            <p class="text-sm text-gray-600">Ikuti langkah-langkah di bawah ini untuk mengunggah
                                prestasimu dengan benar.</p>
                        </div>

                        <div class="space-y-6">
                            <!-- Langkah 1 -->
                            <div>
                                <h3 class="text-lg font-semibold">1. Siapkan berkas yang diperlukan</h3>
                                <p class="text-sm text-gray-600">Berkas yang diperlukan sebagai berikut:</p>
                                <ul class="list-disc list-inside text-sm text-gray-600">
                                    <li>Link berita (Link)</li>
                                    <li>Sertifikat (PDF, Maksimal 5MB)</li>
                                    <li>Foto penyerahan penghargaan (PDF, Maksimal 5MB)</li>
                                    <li>Surat tugas mahasiswa (PDF, Maksimal 5MB)</li>
                                    <li>Surat tugas dosen pembimbing (PDF, Maksimal 5MB)</li>
                                </ul>
                            </div>

                            <!-- Langkah 2 -->
                            <div>
                                <h3 class="text-lg font-semibold">2. Klik Tombol "Upload Prestasi"</h3>
                                <p class="text-sm text-gray-600">Tombol ini bisa kamu temukan di atas atau pada
                                    menu navigasi.</p>
                            </div>

                            <!-- Langkah 3 -->
                            <div>
                                <h3 class="text-lg font-semibold">3. Simpan dan Tunggu Verifikasi</h3>
                                <p class="text-sm text-gray-600">Setelah formulir lengkap, klik "Simpan".
                                    Prestasimu akan dicek oleh admin sebelum ditampilkan.</p>
                            </div>

                            <!-- Catatan -->
                            <div class="bg-gray-100 text-gray-800 p-4 rounded-md">
                                <strong>Catatan:</strong> Jika berkas belum lengkap, kamu bisa melengkapinya
                                nanti. Namun, data belum akan dikirim ke admin hingga lengkap.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hubungi Admin (Kanan) -->
            <div class="w-full md:w-1/3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 h-full">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">HUBUNGI ADMIN</h2>
                            <p class="text-sm text-gray-600 mb-4">Jika mengalami kendala saat mengunggah
                                prestasi, kamu bisa menghubungi admin melalui kontak berikut:</p>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">WhatsApp</p>
                                    <p class="font-medium text-gray-900">+62 852-5900-4449</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="https://wa.me/6285259004449" target="_blank"
                                class="w-full inline-block text-center bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded transition">
                                Chat via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Konten Tutorial End --}}
</x-app-layout>
