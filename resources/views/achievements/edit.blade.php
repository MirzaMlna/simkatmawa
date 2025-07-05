<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Prestasi Mahasiswa
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded px-6 py-8">
            <form action="{{ route('achievements.update', $achievement->id) }}" method="POST"
                enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="identity_number" class="block text-sm font-medium">NPM</label>
                        <input type="text" name="identity_number" id="identity_number"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('identity_number', $achievement->identity_number) }}" required>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium">Nama</label>
                        <input type="text" name="name" id="name" class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('name', $achievement->name) }}" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium">Nomor HP</label>
                        <input type="text" name="phone" id="phone" class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('phone', $achievement->phone) }}" required>
                    </div>

                    <div>
                        <label for="study_program" class="block text-sm font-medium">Program Studi</label>
                        <select name="study_program" id="study_program" class="mt-1 w-full rounded border-gray-300">
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
                                    'Hukum Ekonomi Syari’ah',
                                    'Ekonomi Syari’ah',
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
                                <option value="{{ $program }}"
                                    {{ old('study_program', $achievement->study_program) == $program ? 'selected' : '' }}>
                                    {{ $program }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="achievement_type" class="block text-sm font-medium">Jenis Prestasi</label>
                        <select name="achievement_type" id="achievement_type"
                            class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Akademik"
                                {{ old('achievement_type', $achievement->achievement_type) == 'Akademik' ? 'selected' : '' }}>
                                Akademik</option>
                            <option value="Non Akademik"
                                {{ old('achievement_type', $achievement->achievement_type) == 'Non Akademik' ? 'selected' : '' }}>
                                Non Akademik</option>
                        </select>
                    </div>

                    <div>
                        <label for="program_by" class="block text-sm font-medium">Program Oleh</label>
                        <select name="program_by" id="program_by" class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Dikti"
                                {{ old('program_by', $achievement->program_by) == 'Dikti' ? 'selected' : '' }}>Dikti
                            </option>
                            <option value="Non Dikti"
                                {{ old('program_by', $achievement->program_by) == 'Non Dikti' ? 'selected' : '' }}>Non
                                Dikti</option>
                        </select>
                    </div>

                    <div>
                        <label for="achievement_level" class="block text-sm font-medium">Tingkatan</label>
                        <select name="achievement_level" id="achievement_level"
                            class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            @foreach (['Kabupaten / Kota', 'Provinsi', 'Nasional', 'Internasional'] as $level)
                                <option value="{{ $level }}"
                                    {{ old('achievement_level', $achievement->achievement_level) == $level ? 'selected' : '' }}>
                                    {{ $level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="participation_type" class="block text-sm font-medium">Jenis Partisipasi</label>
                        <select name="participation_type" id="participation_type"
                            class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Individu"
                                {{ old('participation_type', $achievement->participation_type) == 'Individu' ? 'selected' : '' }}>
                                Individu</option>
                            <option value="Kelompok"
                                {{ old('participation_type', $achievement->participation_type) == 'Kelompok' ? 'selected' : '' }}>
                                Kelompok</option>
                        </select>
                    </div>

                    <div>
                        <label for="execution_model" class="block text-sm font-medium">Model Pelaksanaan</label>
                        <select name="execution_model" id="execution_model" class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Daring"
                                {{ old('execution_model', $achievement->execution_model) == 'Daring' ? 'selected' : '' }}>
                                Daring</option>
                            <option value="Luring"
                                {{ old('execution_model', $achievement->execution_model) == 'Luring' ? 'selected' : '' }}>
                                Luring</option>
                        </select>
                    </div>

                    <div>
                        <label for="event_name" class="block text-sm font-medium">Nama Event</label>
                        <input type="text" name="event_name" id="event_name"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('event_name', $achievement->event_name) }}">
                    </div>

                    <div>
                        <label for="participant_count" class="block text-sm font-medium">Jumlah Peserta</label>
                        <input type="number" name="participant_count" id="participant_count"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('participant_count', $achievement->participant_count) }}">
                    </div>

                    <div>
                        <label for="university_count" class="block text-sm font-medium">Jumlah Universitas</label>
                        <select id="university_count" name="university_count"
                            class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="<10"
                                {{ old('university_count', $achievement->university_count) == '<10' ? 'selected' : '' }}>
                                Kurang dari 10
                            </option>
                            <option value=">=10"
                                {{ old('university_count', $achievement->university_count) == '>=10' ? 'selected' : '' }}>
                                Lebih dari atau sama dengan 10
                            </option>

                        </select>
                    </div>

                    <div>
                        <label for="nation_count" class="block text-sm font-medium">Jumlah Negara <span
                                class="text-gray-500">Biarkan "1" jika bukan Internasional</span></label>
                        <input type="number" name="nation_count" id="nation_count"
                            class="mt-1 w-full rounded border-gray-300" min="1"
                            value="{{ old('nation_count', $achievement->nation_count) }}">
                    </div>

                    <div>
                        <label for="achievement_title" class="block text-sm font-medium">Capaian Prestasi</label>
                        <select id="achievement_title" name="achievement_title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Pilih</option>
                            @foreach (['Juara 1', 'Juara 2', 'Juara 3', 'Harapan 1', 'Harapan 2', 'Harapan 3', 'Agregasi Kejuaraan / Penghargaan Tambahan / Juara Umum', 'Peserta'] as $title)
                                <option value="{{ $title }}"
                                    {{ old('achievement_title', $achievement->achievement_title) == $title ? 'selected' : '' }}>
                                    {{ $title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="start_date" class="block text-sm font-medium">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('start_date', $achievement->start_date) }}">
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium">Tanggal Selesai</label>
                        <input type="date" name="end_date" id="end_date"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('end_date', $achievement->end_date) }}">
                    </div>

                    <div class="col-span-2">
                        <label for="news_link" class="block text-sm font-medium">Link Berita</label>
                        <input type="url" name="news_link" id="news_link"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('news_link', $achievement->news_link) }}">
                    </div>

                    <!-- Upload file (opsional, jika tidak upload maka tetap file lama) -->
                    <div>
                        <label for="certificate_file" class="block text-sm font-medium">File Sertifikat (PDF Maks 5
                            MB)</label>
                        <input type="file" name="certificate_file" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="award_photo_file" class="block text-sm font-medium">Foto Penghargaan
                            (.pdf)</label>
                        <input type="file" name="award_photo_file" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="student_assignment_letter" class="block text-sm font-medium">Surat Tugas Mahasiswa
                            (.pdf)</label>
                        <input type="file" name="student_assignment_letter" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="supervisor_assignment_letter" class="block text-sm font-medium">Surat Tugas Dosen
                            Pembimbing (.pdf)</label>
                        <input type="file" name="supervisor_assignment_letter" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="supervisor_number" class="block text-sm font-medium">NIDN Pembimbing</label>
                        <input type="text" name="supervisor_number" id="supervisor_number"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('supervisor_number', $achievement->supervisor_number) }}">
                    </div>

                    <div>
                        <label for="supervisor_nuptk" class="block text-sm font-medium">NUPTK Pembimbing</label>
                        <input type="number" name="supervisor_nuptk" id="supervisor_nuptk"
                            class="mt-1 w-full rounded border-gray-300"
                            value="{{ old('supervisor_nuptk', $achievement->supervisor_nuptk) }}">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Perbarui Prestasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
