<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Prestasi Mahasiswa
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white rounded-2xl p-8 mb-8 shadow-sm border border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center">
                        <i class="bi bi-pencil-square text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Edit Prestasi Mahasiswa</h1>
                        <p class="text-gray-600 mt-2">Perbarui informasi prestasi mahasiswa dengan data terbaru</p>
                    </div>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="bi bi-exclamation-triangle text-red-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat beberapa kesalahan:</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off" class="space-y-8">
                @csrf
                @method('PUT')
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-8 space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-indigo-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-person-circle text-indigo-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="identity_number" class="block text-sm font-medium text-gray-700 mb-2">NPM</label>
                                    <input type="text" name="identity_number" id="identity_number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" value="{{ old('identity_number', $achievement->identity_number) }}" required>
                                </div>

                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                                    <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" value="{{ old('name', $achievement->name) }}" required>
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor HP</label>
                                    <input type="text" name="phone" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" value="{{ old('phone', $achievement->phone) }}" required>
                                </div>

                                <div>
                                    <label for="study_program" class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
                                    <select name="study_program" id="study_program" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                                        <option value="">Pilih Program Studi</option>
                                        @php
                                            $programs = [
                                                'Ilmu Komunikasi',
                                                'Ilmu Administrasi Publik',
                                                'Pendidikan Bahasa Inggris',
                                                'Bimbingan dan Konseling',
                                                'Pendidikan Kimia',
                                                'Pendidikan Olahraga',
                                                'Manajemen',
                                                'Peternakan',
                                                'Agribisnis',
                                                'Hukum Ekonomi Syariah',
                                                'Ekonomi Syariah',
                                                'Pendidikan Guru Madrasah Ibtidaiyah',
                                                'Teknik Mesin',
                                                'Teknik Sipil',
                                                'Teknik Elektro',
                                                'Teknik Industri',
                                                'Kesehatan Masyarakat',
                                                'Ilmu Hukum',
                                                'Teknik Informatika',
                                                'Sistem Informasi',
                                                'Farmasi',
                                            ];
                                        @endphp
                                        @foreach ($programs as $program)
                                            <option value="{{ $program }}" {{ old('study_program', $achievement->study_program) == $program ? 'selected' : '' }}>{{ $program }}</option>
                                        @endforeach
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
                                        <option value="Akademik" {{ old('achievement_type', $achievement->achievement_type) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                        <option value="Non Akademik" {{ old('achievement_type', $achievement->achievement_type) == 'Non Akademik' ? 'selected' : '' }}>Non Akademik</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="program_by" class="block text-sm font-medium text-gray-700 mb-2">Program Oleh</label>
                                    <select name="program_by" id="program_by" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Program --</option>
                                        <option value="Dikti" {{ old('program_by', $achievement->program_by) == 'Dikti' ? 'selected' : '' }}>Dikti</option>
                                        <option value="Non Dikti" {{ old('program_by', $achievement->program_by) == 'Non Dikti' ? 'selected' : '' }}>Non Dikti</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="achievement_level" class="block text-sm font-medium text-gray-700 mb-2">Tingkatan</label>
                                    <select name="achievement_level" id="achievement_level" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Tingkatan --</option>
                                        @foreach (['Kabupaten / Kota', 'Provinsi', 'Nasional', 'Internasional'] as $level)
                                            <option value="{{ $level }}" {{ old('achievement_level', $achievement->achievement_level) == $level ? 'selected' : '' }}>{{ $level }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="participation_type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Partisipasi</label>
                                    <select name="participation_type" id="participation_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Partisipasi --</option>
                                        <option value="Individu" {{ old('participation_type', $achievement->participation_type) == 'Individu' ? 'selected' : '' }}>Individu</option>
                                        <option value="Kelompok" {{ old('participation_type', $achievement->participation_type) == 'Kelompok' ? 'selected' : '' }}>Kelompok</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="execution_model" class="block text-sm font-medium text-gray-700 mb-2">Model Pelaksanaan</label>
                                    <select name="execution_model" id="execution_model" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih Model --</option>
                                        <option value="Daring" {{ old('execution_model', $achievement->execution_model) == 'Daring' ? 'selected' : '' }}>Daring</option>
                                        <option value="Luring" {{ old('execution_model', $achievement->execution_model) == 'Luring' ? 'selected' : '' }}>Luring</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="event_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Event</label>
                                    <input type="text" name="event_name" id="event_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" value="{{ old('event_name', $achievement->event_name) }}">
                                </div>

                                <div>
                                    <label for="participant_count" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Peserta</label>
                                    <input type="number" name="participant_count" id="participant_count" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" value="{{ old('participant_count', $achievement->participant_count) }}">
                                </div>

                                <div>
                                    <label for="university_count" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Universitas</label>
                                    <select id="university_count" name="university_count" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih --</option>
                                        <option value="<10" {{ old('university_count', $achievement->university_count) == '<10' ? 'selected' : '' }}>Kurang dari 10</option>
                                        <option value=">=10" {{ old('university_count', $achievement->university_count) == '>=10' ? 'selected' : '' }}>Lebih dari sama dengan 10</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="nation_count" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Negara <span class="text-gray-500">Biarkan "1" jika bukan Internasional</span></label>
                                    <input type="number" name="nation_count" id="nation_count" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" min="1" value="{{ old('nation_count', $achievement->nation_count) }}">
                                </div>

                                <div>
                                    <label for="achievement_title" class="block text-sm font-medium text-gray-700 mb-2">Capaian Prestasi</label>
                                    <select id="achievement_title" name="achievement_title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <option value="">-- Pilih --</option>
                                        @foreach (['Juara 1', 'Juara 2', 'Juara 3', 'Harapan 1', 'Harapan 2', 'Harapan 3', 'Agregasi Kejuaraan / Penghargaan Tambahan / Juara Umum', 'Peserta'] as $title)
                                            <option value="{{ $title }}" {{ old('achievement_title', $achievement->achievement_title) == $title ? 'selected' : '' }}>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" name="start_date" id="start_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" value="{{ old('start_date', $achievement->start_date) }}">
                                </div>

                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                    <input type="date" name="end_date" id="end_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" value="{{ old('end_date', $achievement->end_date) }}">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="news_link" class="block text-sm font-medium text-gray-700 mb-2">Link Berita</label>
                                    <input type="url" name="news_link" id="news_link" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" value="{{ old('news_link', $achievement->news_link) }}">
                                </div>
                            </div>
                        </div>

                        <!-- File Upload Section -->
                        <div class="bg-green-50 rounded-xl p-6">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="bi bi-cloud-upload text-green-600 text-lg"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Upload Dokumen</h3>
                                <span class="text-sm text-gray-500">(Opsional - biarkan kosong jika tidak ingin mengubah file)</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="certificate_file" class="block text-sm font-medium text-gray-700 mb-2">File Sertifikat</label>
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
                                    <input type="text" name="supervisor_number" id="supervisor_number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" value="{{ old('supervisor_number', $achievement->supervisor_number) }}">
                                </div>
                                
                                <div>
                                    <label for="supervisor_nuptk" class="block text-sm font-medium text-gray-700 mb-2">NUPTK Pembimbing</label>
                                    <input type="number" name="supervisor_nuptk" id="supervisor_nuptk" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" value="{{ old('supervisor_nuptk', $achievement->supervisor_nuptk) }}">
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
                                    <textarea name="keterangan" id="keterangan" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200 resize-none" placeholder="Tambahkan keterangan atau catatan tambahan...">{{ old('keterangan', $achievement->keterangan) }}</textarea>
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <label for="perwakilan_uniska" class="block text-sm font-medium text-gray-700 mb-2">Lomba atas nama perwakilan UNISKA</label>
                                        <select name="perwakilan_uniska" id="perwakilan_uniska" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200">
                                            <option value="">-- Pilih --</option>
                                            <option value="Ya" {{ old('perwakilan_uniska', $achievement->perwakilan_uniska) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('perwakilan_uniska', $achievement->perwakilan_uniska) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="nama_ormawa" class="block text-sm font-medium text-gray-700 mb-2">Nama Ormawa</label>
                                        <p class="text-xs text-gray-500 mb-2">Isi nama ormawa jika ada, kosongkan jika tidak ada</p>
                                        <input type="text" name="nama_ormawa" id="nama_ormawa" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200" value="{{ old('nama_ormawa', $achievement->nama_ormawa) }}">
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
                                <span>Perbarui Prestasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
