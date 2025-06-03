<x-guest-layout>
    <div class="w-full">
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
                    <div class="mt-5">
                        <a class="underline text-blue-600" href="{{ route('welcome') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
