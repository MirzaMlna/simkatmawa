<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                        <i class="bi bi-plus-circle text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Tambah Prestasi Baru</h1>
                        <p class="text-gray-600">Lengkapi formulir di bawah untuk menambahkan prestasi mahasiswa</p>
                    </div>
                </div>
                <div class="w-full h-1 bg-blue-500 rounded-full"></div>
            </div>

            <!-- Form Container -->
            <div class="bg-white shadow-lg rounded-2xl border border-gray-200">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="bi bi-exclamation-triangle text-red-600"></i>
                                <strong class="text-red-800">Oops! Ada beberapa kesalahan:</strong>
                            </div>
                            <ul class="mt-2 list-disc list-inside text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off" class="space-y-8">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-person-circle text-blue-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Informasi Personal</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="identity_number" class="block text-sm font-medium text-gray-700 mb-2">NPM/NIDN</label>
                                    <input type="text" name="identity_number" id="identity_number"
                                        @if (auth()->user()->role === 'Mahasiswa') value="{{ Auth::user()->identity_number }}" readonly @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @if (auth()->user()->role === 'Mahasiswa') bg-gray-100 @endif" required>
                                </div>

                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" id="name"
                                        @if (auth()->user()->role === 'Mahasiswa') value="{{ Auth::user()->name }}" readonly @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @if (auth()->user()->role === 'Mahasiswa') bg-gray-100 @endif" required>
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor HP</label>
                                    <input type="text" name="phone" id="phone"
                                        @if (auth()->user()->role === 'Mahasiswa') value="{{ Auth::user()->phone }}" readonly @endif
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @if (auth()->user()->role === 'Mahasiswa') bg-gray-100 @endif" required>
                                </div>

                                <div>
                                    <label for="study_program" class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
                                    <select name="study_program" id="study_program" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @if (auth()->user()->role === 'Mahasiswa') bg-gray-100 @endif">
                                        @if (auth()->user()->role === 'Mahasiswa')
                                            <option value="{{ Auth::user()->study_program }}">{{ Auth::user()->study_program }}</option>
                                        @endif
                                        @if (auth()->user()->role === 'Admin')
                                            <option value="">Pilih Program Studi</option>
                                            <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                            <option value="Ilmu Administrasi Publik">Ilmu Administrasi Publik</option>
                                            <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                            <option value="Bimbingan dan Konseling">Bimbingan dan Konseling</option>
                                            <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                                            <option value="Pendidikan Olahraga">Pendidikan Olahraga</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Peternakan">Peternakan</option>
                                            <option value="Agribisnis">Agribisnis</option>
                                            <option value="Hukum Ekonomi Syariah">Hukum Ekonomi Syariah</option>
                                            <option value="Ekonomi Syariah">Ekonomi Syariah</option>
                                            <option value="Pendidikan Guru Madrasah Ibtidaiyah">Pendidikan Guru Madrasah Ibtidaiyah</option>
                                            <option value="Teknik Mesin">Teknik Mesin</option>
                                            <option value="Teknik Sipil">Teknik Sipil</option>
                                            <option value="Teknik Elektro">Teknik Elektro</option>
                                            <option value="Teknik Industri">Teknik Industri</option>
                                            <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                            <option value="Ilmu Hukum">Ilmu Hukum</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Farmasi">Farmasi</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Achievement Information Section -->
                        <div class="bg-blue-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-award text-blue-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Informasi Prestasi</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="achievement_type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Prestasi</label>
                                    <select name="achievement_type" id="achievement_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Jenis Prestasi --</option>
                                        <option value="Akademik">Akademik</option>
                                        <option value="Non Akademik">Non Akademik</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="program_by" class="block text-sm font-medium text-gray-700 mb-2">Program Oleh</label>
                                    <select name="program_by" id="program_by" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Program --</option>
                                        <option value="Dikti">Dikti</option>
                                        <option value="Non Dikti">Non Dikti</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="achievement_level" class="block text-sm font-medium text-gray-700 mb-2">Tingkatan</label>
                                    <select name="achievement_level" id="achievement_level" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Tingkatan --</option>
                                        <option value="Kabupaten / Kota">Kabupaten/Kota</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Internasional">Internasional</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="participation_type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Partisipasi</label>
                                    <select name="participation_type" id="participation_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Partisipasi --</option>
                                        <option value="Individu">Individu</option>
                                        <option value="Kelompok">Kelompok</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="execution_model" class="block text-sm font-medium text-gray-700 mb-2">Model Pelaksanaan</label>
                                    <select name="execution_model" id="execution_model" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Model --</option>
                                        <option value="Daring">Daring</option>
                                        <option value="Luring">Luring</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="event_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Event</label>
                                    <input type="text" name="event_name" id="event_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <div>
                                    <label for="participant_count" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Peserta</label>
                                    <input type="number" name="participant_count" id="participant_count" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <div>
                                    <label for="university_count" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Universitas</label>
                                    <select id="university_count" name="university_count" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih --</option>
                                        <option value="<10">Kurang dari 10</option>
                                        <option value=">=10">Lebih dari sama dengan 10</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="nation_count" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Negara <span class="text-gray-500">Biarkan "1" jika bukan Internasional</span></label>
                                    <input type="number" name="nation_count" id="nation_count" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" min="1" value="1">
                                </div>

                                <div>
                                    <label for="achievement_title" class="block text-sm font-medium text-gray-700 mb-2">Capaian Prestasi</label>
                                    <select id="achievement_title" name="achievement_title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih --</option>
                                        <option value="Juara 1">Juara 1</option>
                                        <option value="Juara 2">Juara 2</option>
                                        <option value="Juara 3">Juara 3</option>
                                        <option value="Harapan 1">Harapan 1</option>
                                        <option value="Harapan 2">Harapan 2</option>
                                        <option value="Harapan 3">Harapan 3</option>
                                        <option value="Harapan 3">Agregasi Kejuaraan / Penghargaan Tambahan / Juara Umum</option>
                                        <option value="Peserta">Peserta</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" name="start_date" id="start_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                    <input type="date" name="end_date" id="end_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="news_link" class="block text-sm font-medium text-gray-700 mb-2">Link Berita</label>
                                    <input type="url" name="news_link" id="news_link" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>
                            </div>
                        </div>

                        <!-- File Upload Section -->
                        <div class="bg-green-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-cloud-upload text-green-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Upload Dokumen</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="certificate_file" class="block text-sm font-medium text-gray-700 mb-2">File Sertifikat <span class="text-red-500">*</span></label>
                                    <p class="text-xs text-gray-500 mb-2">PDF Maksimal 5 MB</p>
                                    <input type="file" name="certificate_file" accept="application/pdf" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                </div>

                                <div>
                                    <label for="award_photo_file" class="block text-sm font-medium text-gray-700 mb-2">Foto Penghargaan</label>
                                    <p class="text-xs text-gray-500 mb-2">PDF Maksimal 5 MB</p>
                                    <input type="file" name="award_photo_file" accept="application/pdf" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                </div>

                                <div>
                                    <label for="student_assignment_letter" class="block text-sm font-medium text-gray-700 mb-2">Surat Tugas Mahasiswa</label>
                                    <p class="text-xs text-gray-500 mb-2">PDF Maksimal 5 MB</p>
                                    <input type="file" name="student_assignment_letter" accept="application/pdf" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                </div>

                                <div>
                                    <label for="supervisor_assignment_letter" class="block text-sm font-medium text-gray-700 mb-2">Surat Tugas Dosen Pembimbing</label>
                                    <p class="text-xs text-gray-500 mb-2">PDF Maksimal 5 MB</p>
                                    <input type="file" name="supervisor_assignment_letter" accept="application/pdf" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                </div>
                            </div>
                        </div>

                        <!-- Supervisor Information Section -->
                        <div class="bg-purple-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-person-badge text-purple-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Informasi Pembimbing</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="supervisor_number" class="block text-sm font-medium text-gray-700 mb-2">NIDN Pembimbing</label>
                                    <input type="number" name="supervisor_number" id="supervisor_number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200">
                                </div>
                                
                                <div>
                                    <label for="supervisor_nuptk" class="block text-sm font-medium text-gray-700 mb-2">NUPTK Pembimbing</label>
                                    <input type="number" name="supervisor_nuptk" id="supervisor_nuptk" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-chat-text text-gray-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Informasi Tambahan</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200 resize-none" placeholder="Tambahkan keterangan atau catatan tambahan...">{{ old('keterangan') }}</textarea>
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <label for="perwakilan_uniska" class="block text-sm font-medium text-gray-700 mb-2">Lomba atas nama perwakilan UNISKA</label>
                                        <select name="perwakilan_uniska" id="perwakilan_uniska" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200">
                                            <option value="">-- Pilih --</option>
                                            <option value="Ya" {{ old('perwakilan_uniska') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('perwakilan_uniska') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="nama_ormawa" class="block text-sm font-medium text-gray-700 mb-2">Nama Ormawa</label>
                                        <p class="text-xs text-gray-500 mb-2">Isi nama ormawa jika ada, kosongkan jika tidak ada</p>
                                        <input type="text" name="nama_ormawa" id="nama_ormawa" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200" value="{{ old('nama_ormawa') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('achievements.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200 flex items-center space-x-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 flex items-center space-x-2 shadow-lg hover:shadow-xl">
                                <i class="bi bi-check-circle"></i>
                                <span>Simpan Prestasi</span>
                            </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
