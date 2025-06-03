<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Prestasi
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8 sm:py-6 lg:py-8">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if (auth()->user()->role === 'Admin')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <!-- Total Prestasi -->
                    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-semibold">Total Prestasi Masuk</h3>
                                <p class="text-2xl font-bold">{{ $achievementCount }}</p>
                            </div>
                            <i class="bi bi-award-fill text-3xl"></i>
                        </div>
                    </div>

                    <!-- Prestasi Tertunda -->
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-semibold">Prestasi Tertunda</h3>
                                <p class="text-2xl font-bold">{{ $pendingCount }}</p>
                            </div>
                            <i class="bi bi-clock-fill text-3xl"></i>
                        </div>
                    </div>
                </div>
            @endif

            <div class="overflow-x-auto">
                <div class="ms-1 mt-1 mb-4 flex items-center justify-between">
                    <a href="{{ route('achievements.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                        <i class="bi bi-plus-lg me-2"></i> Tambah Prestasi
                    </a>
                    <!-- Input Search -->
                    @if (auth()->user()->role === 'Admin')
                        <form method="GET" action="{{ route('achievements.index') }}" class="flex items-center gap-2">
                            <input type="text" name="search" placeholder="Cari data..."
                                value="{{ request('search') }}"
                                class="ml-4 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 text-sm">
                            <button type="submit"
                                class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                                Cari
                            </button>
                        </form>
                        <a href="{{ url('/achievements.export') }}"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded shadow">
                            <i class="bi bi-download mr-1"></i> Export Excel
                        </a>
                    @endif
                </div>

                <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200">
                    <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                        <tr>
                            <th class="px-4 py-2">NPM</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Prodi</th>
                            <th class="px-4 py-2">Jenis</th>
                            <th class="px-4 py-2">Tingkatan</th>
                            <th class="px-4 py-2">Capaian</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach ($achievements as $achievement)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $achievement->identity_number }}</td>
                                <td class="px-4 py-2">{{ $achievement->name }}</td>
                                <td class="px-4 py-2">{{ $achievement->study_program }}</td>
                                <td class="px-4 py-2">{{ $achievement->achievement_type }}</td>
                                <td class="px-4 py-2">{{ $achievement->achievement_level }}</td>
                                <td class="px-4 py-2">{{ $achievement->achievement_title }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block px-2 py-1 text-xs rounded 
                                        {{ $achievement->status == 'Diterima' ? 'bg-green-100 text-green-800' : ($achievement->status == 'Ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ $achievement->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-center space-x-2">
                                    @if (auth()->user()->role === 'Admin')
                                        <!-- Show Modal -->
                                        <button onclick="showModal({{ $achievement->id }})"
                                            class="text-blue-600 hover:text-blue-800" title="Lihat Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>

                                        <!-- Edit -->
                                        <a href="{{ route('achievements.edit', $achievement->id) }}"
                                            class="text-indigo-600 hover:text-indigo-800" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <!-- Hubungi -->
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $achievement->phone) }}"
                                            class="text-green-600 hover:text-green-800" title="Hubungi via WhatsApp"
                                            target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>

                                        <!-- Tunda -->
                                        <form
                                            action="{{ route('achievements.updateStatus', ['id' => $achievement->id, 'status' => 'Tunda']) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-yellow-600 hover:text-yellow-800"
                                                title="Tunda">
                                                <i class="bi bi-clock-fill"></i>
                                            </button>
                                        </form>

                                        <!-- Terima -->
                                        <form
                                            action="{{ route('achievements.updateStatus', ['id' => $achievement->id, 'status' => 'Diterima']) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-600 hover:text-green-800"
                                                title="Terima">
                                                <i class="bi bi-check-circle-fill"></i>
                                            </button>
                                        </form>
                                    @elseif (auth()->user()->role === 'Mahasiswa')
                                        <!-- Show Modal -->
                                        <button onclick="showModal({{ $achievement->id }})"
                                            class="text-blue-600 hover:text-blue-800" title="Lihat Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>

                                        @if ($achievement->status !== 'Diterima')
                                            <!-- Edit -->
                                            <a href="{{ route('achievements.edit', $achievement->id) }}"
                                                class="text-indigo-600 hover:text-indigo-800" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('achievements.destroy', $achievement->id) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800"
                                                    title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endif

                                </td>

                            </tr>

                            <!-- Modal -->
                            <div id="modal-{{ $achievement->id }}"
                                class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                                <div
                                    class="bg-white rounded-lg shadow-lg p-6 w-full max-w-3xl relative overflow-y-auto max-h-[90vh]">
                                    <button onclick="closeModal({{ $achievement->id }})"
                                        class="absolute top-2 right-2 text-gray-500 hover:text-red-600">
                                        <i class="bi bi-x-circle-fill text-xl"></i>
                                    </button>
                                    <h3 class="text-lg font-semibold mb-4">Detail Lengkap Prestasi</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                                        <div><strong>NIDN:</strong> {{ $achievement->identity_number }}</div>
                                        <div><strong>Nama:</strong> {{ $achievement->name }}</div>
                                        <div><strong>No HP:</strong> {{ $achievement->phone }}</div>
                                        <div><strong>Prodi:</strong> {{ $achievement->study_program }}</div>
                                        <div><strong>Jenis Prestasi:</strong> {{ $achievement->achievement_type }}
                                        </div>
                                        <div><strong>Program Oleh:</strong> {{ $achievement->program_by }}</div>
                                        <div><strong>Tingkatan:</strong> {{ $achievement->achievement_level }}</div>
                                        <div><strong>Model Pelaksanaan:</strong> {{ $achievement->execution_model }}
                                        </div>
                                        <div><strong>Jenis Partisipasi:</strong> {{ $achievement->participation_type }}
                                        </div>
                                        <div><strong>Nama Event:</strong> {{ $achievement->event_name }}</div>
                                        <div><strong>Jumlah Peserta:</strong> {{ $achievement->participant_count }}
                                        </div>
                                        <div><strong>Jumlah Universitas:</strong> {{ $achievement->university_count }}
                                        </div>
                                        <div><strong>Jumlah Negara:</strong> {{ $achievement->nation_count }}</div>
                                        <div><strong>Capaian:</strong> {{ $achievement->achievement_title }}</div>
                                        <div><strong>Periode:</strong> {{ $achievement->start_date }} s/d
                                            {{ $achievement->end_date }}</div>
                                        <div><strong>Status:</strong> {{ $achievement->status }}</div>
                                        <div class="col-span-2"><strong>Link Berita:</strong>
                                            @if ($achievement->news_link)
                                                <a href="{{ $achievement->news_link }}" target="_blank"
                                                    class="text-blue-600 underline">
                                                    {{ $achievement->news_link }}
                                                </a>
                                            @else
                                                <span class="text-red-500">Tidak ada</span>
                                            @endif
                                        </div>

                                        <!-- File Links -->
                                        <div><strong>Sertifikat:</strong>
                                            @if ($achievement->certificate_file)
                                                <a href="{{ asset('storage/' . $achievement->certificate_file) }}"
                                                    target="_blank" class="text-blue-600 underline">
                                                    Lihat Sertifikat
                                                </a>
                                            @else
                                                <span class="text-red-500">Tidak ada</span>
                                            @endif
                                        </div>

                                        <div><strong>Foto Penghargaan:</strong>
                                            @if ($achievement->award_photo_file)
                                                <a href="{{ asset('storage/' . $achievement->award_photo_file) }}"
                                                    target="_blank" class="text-blue-600 underline">
                                                    Lihat Foto
                                                </a>
                                            @else
                                                <span class="text-red-500">Tidak ada</span>
                                            @endif
                                        </div>

                                        <div><strong>Surat Tugas Mahasiswa:</strong>
                                            @if ($achievement->student_assignment_letter)
                                                <a href="{{ asset('storage/' . $achievement->student_assignment_letter) }}"
                                                    target="_blank" class="text-blue-600 underline">
                                                    Lihat Surat
                                                </a>
                                            @else
                                                <span class="text-red-500">Tidak ada</span>
                                            @endif
                                        </div>


                                        <div><strong>Surat Tugas Pembimbing:</strong>
                                            @if ($achievement->supervisor_assignment_letter)
                                                <a href="{{ asset('storage/' . $achievement->supervisor_assignment_letter) }}"
                                                    target="_blank" class="text-blue-600 underline">
                                                    Lihat Surat
                                                </a>
                                            @else
                                                <span class="text-red-500">Tidak ada</span>
                                            @endif
                                        </div>
                                        <div><strong>NIDN Pembimbing:</strong>
                                            {{ $achievement->supervisor_number ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $achievements->links() }}
                </div>
                @if (Auth::user()->role === 'Mahasiswa')
                    <div class=" text-gray-400 mt-5"> Jika data belum lengkap, simpan dulu dan lengkapi
                        nanti.
                        Data
                        tidak
                        akan dikirim ke Admin sampai semua kolom wajib terisi!</div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function showModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }

        function showModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }
    </script>

</x-app-layout>
