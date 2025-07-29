<x-app-layout>
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6">
            <div class="flex flex-col space-y-4 lg:flex-row lg:items-center lg:justify-between lg:space-y-0">
                <div class="min-w-0">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 flex items-center space-x-2 truncate">
                        <i class="bi bi-trophy text-blue-600"></i>
                        <span>Daftar Prestasi</span>
                    </h1>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Kelola dan pantau prestasi akademik</p>
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 flex-shrink-0">
                    @if(Auth::user()->role !== 'admin')
                        <a href="{{ route('achievements.create') }}" class="inline-flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md text-sm">
                            <i class="bi bi-plus-circle"></i>
                            <span>Tambah Prestasi</span>
                        </a>
                    @endif
                    @if(Auth::user()->role == 'admin')
                        <button onclick="exportToExcel()" class="inline-flex items-center justify-center space-x-2 bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md text-sm">
                            <i class="bi bi-file-earmark-excel"></i>
                            <span>Export Excel</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6">
            @if (auth()->user()->role === 'Admin')
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-8">
                    <div class="bg-blue-50 p-4 sm:p-6 rounded-xl border border-blue-200">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0">
                                <h4 class="font-semibold text-blue-800 text-xs sm:text-sm truncate">Total Prestasi</h4>
                                <p class="text-xl sm:text-3xl font-bold text-blue-600 mt-2">{{ $achievementCount }}</p>
                            </div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-trophy text-white text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-50 p-4 sm:p-6 rounded-xl border border-green-200">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0">
                                <h4 class="font-semibold text-green-800 text-xs sm:text-sm truncate">Terverifikasi</h4>
                                <p class="text-xl sm:text-3xl font-bold text-green-600 mt-2">{{ \App\Models\Achievement::where('status', 'Diterima')->count() }}</p>
                            </div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-check-circle text-white text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-orange-50 p-4 sm:p-6 rounded-xl border border-orange-200">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0">
                                <h4 class="font-semibold text-orange-800 text-xs sm:text-sm truncate">Menunggu</h4>
                                <p class="text-xl sm:text-3xl font-bold text-orange-600 mt-2">{{ $pendingCount }}</p>
                            </div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-orange-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-clock text-white text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-50 p-4 sm:p-6 rounded-xl border border-red-200">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0">
                                <h4 class="font-semibold text-red-800 text-xs sm:text-sm truncate">Ditolak</h4>
                                <p class="text-xl sm:text-3xl font-bold text-red-600 mt-2">{{ \App\Models\Achievement::where('status', 'Ditolak')->count() }}</p>
                            </div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-red-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-x-circle text-white text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6">
            <form method="GET" action="{{ route('achievements.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="lg:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama, judul prestasi, atau institusi..." class="w-full pl-10 pr-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-sm">
                        </div>
                    </div>
                    @if(Auth::user()->role == 'Admin')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-sm">
                                <option value="">Semua Status</option>
                                <option value="Tunda" {{ request('status') == 'Tunda' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tingkat</label>
                            <select name="tingkat" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-sm">
                                <option value="">Semua Tingkat</option>
                                <option value="Internasional" {{ request('tingkat') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                                <option value="Nasional" {{ request('tingkat') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                <option value="Regional" {{ request('tingkat') == 'Regional' ? 'selected' : '' }}>Regional</option>
                                <option value="Lokal" {{ request('tingkat') == 'Lokal' ? 'selected' : '' }}>Lokal</option>
                            </select>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                    <button type="submit" class="inline-flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 sm:px-5 rounded-lg transition-all duration-200 text-sm">
                        <i class="bi bi-search"></i>
                        <span>Cari Prestasi</span>
                    </button>
                    <a href="{{ route('achievements.index') }}" class="inline-flex items-center justify-center space-x-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-4 sm:px-5 rounded-lg transition-all duration-200 text-sm">
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Reset Filter</span>
                    </a>
                    @if(Auth::user()->role == 'Admin')
                        <a href="{{ url('/achievements.export') }}" class="inline-flex items-center justify-center space-x-2 bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-4 sm:px-5 rounded-lg transition-all duration-200 text-sm">
                            <i class="bi bi-download"></i>
                            <span>Export Excel</span>
                        </a>
                    @endif
                </div>
            </form>

        </div>

        <!-- Data Table Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">NPM</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Prodi</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Jenis</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Tingkatan</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Capaian</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Status</th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="dataTable">
                                @forelse ($achievements as $index => $achievement)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-900">{{ $achievement->identity_number }}</td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($achievement->name, 0, 1) }}</span>
                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">{{ $achievement->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $achievement->phone ?? 'No phone' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-900">{{ $achievement->study_program }}</td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $achievement->achievement_type }}
                                            </span>
                                        </td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                            @if($achievement->achievement_level == 'Internasional')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    <i class="bi bi-globe mr-1"></i>{{ $achievement->achievement_level }}
                                                </span>
                                            @elseif($achievement->achievement_level == 'Nasional')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="bi bi-flag mr-1"></i>{{ $achievement->achievement_level }}
                                                </span>
                                            @elseif($achievement->achievement_level == 'Regional')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <i class="bi bi-geo-alt mr-1"></i>{{ $achievement->achievement_level }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    <i class="bi bi-building mr-1"></i>{{ $achievement->achievement_level }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-900">{{ $achievement->achievement_title }}</td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                            @if ($achievement->status == 'Tunda')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                    <i class="bi bi-clock mr-1"></i>Menunggu
                                                </span>
                                            @elseif($achievement->status == 'Diterima')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="bi bi-check-circle mr-1"></i>Diterima
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <i class="bi bi-x-circle mr-1"></i>Ditolak
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Detail Button -->
                                                <button onclick="showModal({{ $achievement->id }})" class="inline-flex items-center p-2 text-blue-600 hover:text-blue-900 hover:bg-blue-50 rounded-lg transition-all duration-200" title="Lihat Detail">
                                                    <i class="bi bi-eye text-sm"></i>
                                                </button>

                                                @if (auth()->user()->role === 'Admin')
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('achievements.edit', $achievement->id) }}" class="inline-flex items-center p-2 text-indigo-600 hover:text-indigo-900 hover:bg-indigo-50 rounded-lg transition-all duration-200" title="Edit">
                                                        <i class="bi bi-pencil text-sm"></i>
                                                    </a>

                                                    <!-- WhatsApp Button -->
                                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $achievement->phone) }}" class="inline-flex items-center p-2 text-green-600 hover:text-green-900 hover:bg-green-50 rounded-lg transition-all duration-200" title="Hubungi via WhatsApp" target="_blank">
                                                        <i class="bi bi-whatsapp text-sm"></i>
                                                    </a>

                                                    <!-- Pending Button -->
                                                    <form action="{{ route('achievements.updateStatus', ['id' => $achievement->id, 'status' => 'Tunda']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="inline-flex items-center p-2 text-yellow-600 hover:text-yellow-900 hover:bg-yellow-50 rounded-lg transition-all duration-200" title="Tunda">
                                                            <i class="bi bi-clock text-sm"></i>
                                                        </button>
                                                    </form>

                                                    <!-- Accept Button -->
                                                    <form action="{{ route('achievements.updateStatus', ['id' => $achievement->id, 'status' => 'Diterima']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="inline-flex items-center p-2 text-green-600 hover:text-green-900 hover:bg-green-50 rounded-lg transition-all duration-200" title="Terima">
                                                            <i class="bi bi-check-circle text-sm"></i>
                                                        </button>
                                                    </form>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center p-2 text-red-600 hover:text-red-900 hover:bg-red-50 rounded-lg transition-all duration-200" title="Hapus">
                                                            <i class="bi bi-trash text-sm"></i>
                                                        </button>
                                                    </form>
                                                @elseif (auth()->user()->role === 'Mahasiswa')
                                                    @if ($achievement->status !== 'Diterima')
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('achievements.edit', $achievement->id) }}" class="inline-flex items-center p-2 text-indigo-600 hover:text-indigo-900 hover:bg-indigo-50 rounded-lg transition-all duration-200" title="Edit">
                                                            <i class="bi bi-pencil text-sm"></i>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="inline-flex items-center p-2 text-red-600 hover:text-red-900 hover:bg-red-50 rounded-lg transition-all duration-200" title="Hapus">
                                                                <i class="bi bi-trash text-sm"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-3 sm:px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center space-y-3">
                                                <i class="bi bi-inbox text-4xl text-gray-400"></i>
                                                <p class="text-gray-500 text-lg font-medium">Belum ada data prestasi</p>
                                                <p class="text-gray-400 text-sm">Data prestasi akan muncul di sini setelah ditambahkan</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
            </div>

            <!-- Pagination -->
            <div class="border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex flex-1 justify-between sm:hidden">
                        @if ($achievements->onFirstPage())
                            <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500">Previous</span>
                        @else
                            <a href="{{ $achievements->previousPageUrl() }}" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        @endif
                        
                        @if ($achievements->hasMorePages())
                            <a href="{{ $achievements->nextPageUrl() }}" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                        @else
                            <span class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500">Next</span>
                        @endif
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">{{ $achievements->firstItem() ?? 0 }}</span>
                                to
                                <span class="font-medium">{{ $achievements->lastItem() ?? 0 }}</span>
                                of
                                <span class="font-medium">{{ $achievements->total() }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            {{ $achievements->links() }}
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role === 'Mahasiswa')
                <div class="px-4 py-3 text-sm text-gray-500 bg-gray-50 border-t border-gray-200">
                    <i class="bi bi-info-circle mr-1"></i>
                    Jika data belum lengkap, simpan dulu dan lengkapi nanti. Data tidak akan dikirim ke Admin sampai semua kolom wajib terisi!
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Components -->
    @foreach ($achievements as $achievement)
        <div id="modal-{{ $achievement->id }}"
            class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-4xl relative overflow-y-auto max-h-[90vh] m-4">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <i class="bi bi-trophy text-blue-600"></i>
                        <span>Detail Lengkap Prestasi</span>
                    </h3>
                    <button onclick="closeModal({{ $achievement->id }})"
                        class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="bi bi-x-lg text-lg"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center space-x-2">
                            <i class="bi bi-person-circle text-blue-600"></i>
                            <span>Informasi Personal</span>
                        </h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">NPM/NIDN:</span>
                                <span class="font-medium">{{ $achievement->identity_number }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nama:</span>
                                <span class="font-medium">{{ $achievement->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">No HP:</span>
                                <span class="font-medium">{{ $achievement->phone }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Program Studi:</span>
                                <span class="font-medium">{{ $achievement->study_program }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Achievement Information -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center space-x-2">
                            <i class="bi bi-award text-blue-600"></i>
                            <span>Informasi Prestasi</span>
                        </h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jenis:</span>
                                <span class="font-medium">{{ $achievement->achievement_type }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tingkatan:</span>
                                <span class="font-medium">{{ $achievement->achievement_level }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Capaian:</span>
                                <span class="font-medium">{{ $achievement->achievement_title }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-medium">
                                    @if ($achievement->status == 'Tunda')
                                        <span class="text-orange-600">Menunggu</span>
                                    @elseif($achievement->status == 'Diterima')
                                        <span class="text-green-600">Diterima</span>
                                    @else
                                        <span class="text-red-600">Ditolak</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center space-x-2">
                            <i class="bi bi-calendar-event text-blue-600"></i>
                            <span>Detail Event</span>
                        </h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nama Event:</span>
                                <span class="font-medium">{{ $achievement->event_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Program Oleh:</span>
                                <span class="font-medium">{{ $achievement->program_by }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Model Pelaksanaan:</span>
                                <span class="font-medium">{{ $achievement->execution_model }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jenis Partisipasi:</span>
                                <span class="font-medium">{{ $achievement->participation_type }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Periode:</span>
                                <span class="font-medium">{{ $achievement->start_date }} s/d {{ $achievement->end_date }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center space-x-2">
                            <i class="bi bi-bar-chart text-blue-600"></i>
                            <span>Statistik Peserta</span>
                        </h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jumlah Peserta:</span>
                                <span class="font-medium">{{ $achievement->participant_count }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jumlah Universitas:</span>
                                <span class="font-medium">{{ $achievement->university_count }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jumlah Negara:</span>
                                <span class="font-medium">{{ $achievement->nation_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="mt-6 space-y-4">
                    <!-- News Link -->
                    <div class="bg-blue-50 rounded-lg p-4">
                        <h4 class="font-semibold text-blue-900 mb-2 flex items-center space-x-2">
                            <i class="bi bi-link-45deg"></i>
                            <span>Link Berita</span>
                        </h4>
                        @if ($achievement->news_link)
                            <a href="{{ $achievement->news_link }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800 underline break-all">
                                {{ $achievement->news_link }}
                            </a>
                        @else
                            <span class="text-gray-500 italic">Tidak ada link berita</span>
                        @endif
                    </div>

                    <!-- File Downloads -->
                    <div class="bg-green-50 rounded-lg p-4">
                        <h4 class="font-semibold text-green-900 mb-3 flex items-center space-x-2">
                            <i class="bi bi-file-earmark-arrow-down"></i>
                            <span>File Dokumen</span>
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-center justify-between p-2 bg-white rounded border">
                                <span class="text-sm text-gray-600">Sertifikat:</span>
                                @if ($achievement->certificate_file)
                                    <a href="{{ asset('storage/' . $achievement->certificate_file) }}"
                                        target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="bi bi-download mr-1"></i>Download
                                    </a>
                                @else
                                    <span class="text-red-500 text-sm">Tidak ada</span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between p-2 bg-white rounded border">
                                <span class="text-sm text-gray-600">Foto Penghargaan:</span>
                                @if ($achievement->award_photo_file)
                                    <a href="{{ asset('storage/' . $achievement->award_photo_file) }}"
                                        target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="bi bi-download mr-1"></i>Download
                                    </a>
                                @else
                                    <span class="text-red-500 text-sm">Tidak ada</span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between p-2 bg-white rounded border">
                                <span class="text-sm text-gray-600">Surat Tugas Mahasiswa:</span>
                                @if ($achievement->student_assignment_letter)
                                    <a href="{{ asset('storage/' . $achievement->student_assignment_letter) }}"
                                        target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="bi bi-download mr-1"></i>Download
                                    </a>
                                @else
                                    <span class="text-red-500 text-sm">Tidak ada</span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between p-2 bg-white rounded border">
                                <span class="text-sm text-gray-600">Surat Tugas Pembimbing:</span>
                                @if ($achievement->supervisor_assignment_letter)
                                    <a href="{{ asset('storage/' . $achievement->supervisor_assignment_letter) }}"
                                        target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="bi bi-download mr-1"></i>Download
                                    </a>
                                @else
                                    <span class="text-red-500 text-sm">Tidak ada</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center space-x-2">
                            <i class="bi bi-info-circle"></i>
                            <span>Informasi Tambahan</span>
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-600">NIDN Pembimbing:</span>
                                <p class="font-medium">{{ $achievement->supervisor_number ?? '-' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600">NUPTK Pembimbing:</span>
                                <p class="font-medium">{{ $achievement->supervisor_nuptk ?? '-' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600">Perwakilan UNISKA:</span>
                                <p class="font-medium">{{ $achievement->perwakilan_uniska ?? '-' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600">Nama Ormawa:</span>
                                <p class="font-medium">{{ $achievement->nama_ormawa ?? '-' }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <span class="text-gray-600">Keterangan:</span>
                                <p class="font-medium">{{ $achievement->keterangan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="mt-6 flex justify-end">
                    <button onclick="closeModal({{ $achievement->id }})"
                        class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @endforeach
                    </tbody>
                </table>

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
