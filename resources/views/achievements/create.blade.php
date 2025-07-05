<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Prestasi Mahasiswa
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded px-6 py-8">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-100 border border-red-400 text-red-700">
                    <strong>Oops! Ada beberapa kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="identity_number" class="block text-sm font-medium">NPM</label>
                        <input type="text" name="identity_number" id="identity_number"
                            @if (auth()->user()->role === 'Mahasiswa') value="{{ Auth::user()->identity_number }}"  readonly @endif
                            class="mt-1 w-full rounded border-gray-300" required>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium">Nama</label>
                        <input type="text" name="name" id="name" class="mt-1 w-full rounded border-gray-300"
                            @if (auth()->user()->role === 'Mahasiswa') value="{{ Auth::user()->name }}" readonly @endif required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium">Nomor HP</label>
                        <input type="text" name="phone" id="phone" class="mt-1 w-full rounded border-gray-300"
                            @if (auth()->user()->role === 'Mahasiswa') value="{{ Auth::user()->phone }}" readonly @endif
                            required>
                    </div>

                    <div>
                        <label for="study_program" class="block text-sm font-medium">Program Studi</label>
                        <select name="study_program" id="study_program" class="mt-1 w-full rounded border-gray-300">
                            @if (auth()->user()->role === 'Mahasiswa')
                                <option value="{{ Auth::user()->study_program }}">{{ Auth::user()->study_program }}
                                </option>
                            @endif
                            @if (auth()->user()->role === 'Admin')
                                <option value="">Pilih Program Studi</option>
                                <!-- isi opsi program studi tetap sama -->
                                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                <option value="Ilmu Administrasi Publik">Ilmu Administrasi Publik</option>
                                <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                <option value="Bimbingan dan Konseling">Bimbingan dan Konseling</option>
                                <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                                <option value="Pendidikan Olahraga">Pendidikan Olahraga</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Peternakan">Peternakan</option>
                                <option value="Agribisnis">Agribisnis</option>
                                <option value="Hukum Ekonomi Syari’ah">Hukum Ekonomi Syari’ah</option>
                                <option value="Ekonomi Syari’ah">Ekonomi Syari’ah</option>
                                <option value="Pendidikan Guru Madrasah Ibtidaiyah">Pendidikan Guru Madrasah Ibtidaiyah
                                </option>
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

                    <div>
                        <label for="achievement_type" class="block text-sm font-medium">Jenis Prestasi</label>
                        <select name="achievement_type" id="achievement_type"
                            class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Non Akademik">Non Akademik</option>
                        </select>
                    </div>

                    <div>
                        <label for="program_by" class="block text-sm font-medium">Program Oleh</label>
                        <select name="program_by" id="program_by" class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Dikti">Dikti</option>
                            <option value="Non Dikti">Non Dikti</option>
                        </select>
                    </div>

                    <div>
                        <label for="achievement_level" class="block text-sm font-medium">Tingkatan</label>
                        <select name="achievement_level" id="achievement_level"
                            class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Kabupaten / Kota">Kabupaten/Kota</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>

                    <div>
                        <label for="participation_type" class="block text-sm font-medium">Jenis Partisipasi</label>
                        <select name="participation_type" id="participation_type"
                            class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Individu">Individu</option>
                            <option value="Kelompok">Kelompok</option>
                        </select>
                    </div>

                    <div>
                        <label for="execution_model" class="block text-sm font-medium">Model Pelaksanaan</label>
                        <select name="execution_model" id="execution_model" class="mt-1 w-full rounded border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="Daring">Daring</option>
                            <option value="Luring">Luring</option>
                        </select>
                    </div>

                    <div>
                        <label for="event_name" class="block text-sm font-medium">Nama Event</label>
                        <input type="text" name="event_name" id="event_name"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="participant_count" class="block text-sm font-medium">Jumlah Peserta</label>
                        <input type="number" name="participant_count" id="participant_count"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="university_count" class="block text-sm font-medium">Jumlah Universitas</label>
                        <select id="university_count" name="university_count"
                            class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">-- Pilih --</option>
                            <option value="<10">Kurang dari 10</option>
                            <option value=">=10">Lebih dari sama dengan 10</option>
                        </select>
                    </div>

                    <div>
                        <label for="nation_count" class="block text-sm font-medium">Jumlah Negara <span
                                class="text-gray-500">Biarkan "1" jika bukan Internasional</span></label>
                        <input type="number" name="nation_count" id="nation_count"
                            class="mt-1 w-full rounded border-gray-300" min="1" value="1">
                    </div>

                    <div>
                        <label for="achievement_title" class="block text-sm font-medium">Capaian Prestasi</label>
                        <select id="achievement_title" name="achievement_title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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
                        <label for="start_date" class="block text-sm font-medium">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium">Tanggal Selesai</label>
                        <input type="date" name="end_date" id="end_date"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div class="col-span-2">
                        <label for="news_link" class="block text-sm font-medium">Link Berita</label>
                        <input type="url" name="news_link" id="news_link"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <!-- Upload file -->
                    <div>
                        <label for="certificate_file" class="block text-sm font-medium">File Sertifikat (PDF Maksimal
                            5 MB)</label>
                        <input type="file" name="certificate_file" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="award_photo_file" class="block text-sm font-medium">Foto Penghargaan
                            <span class="text-gray-500">.pdf (Maksimal 5 mb)</span></label>
                        <input type="file" name="award_photo_file" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="student_assignment_letter" class="block text-sm font-medium">Surat Tugas Mahasiswa
                            <span class="text-gray-500">.pdf (Maksimal 5 mb)</span></label>
                        <input type="file" name="student_assignment_letter" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>


                    <div>
                        <label for="supervisor_assignment_letter" class="block text-sm font-medium">Surat Tugas Dosen
                            Pembimbing
                            <span class="text-gray-500">.pdf (Maksimal 5 mb)</label>
                        <input type="file" name="supervisor_assignment_letter" accept="application/pdf"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="supervisor_number" class="block text-sm font-medium">NIDN Pembimbing</label>
                        <input type="number" name="supervisor_number" id="supervisor_number"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>
                    <div>
                        <label for="supervisor_nuptk" class="block text-sm font-medium">NUPTK Pembimbing</label>
                        <input type="number" name="supervisor_nuptk" id="supervisor_nuptk"
                            class="mt-1 w-full rounded border-gray-300">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Simpan Prestasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
