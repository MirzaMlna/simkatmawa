<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Pengguna
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8 sm:py-6 lg:py-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4">
                <div class="overflow-x-auto">
                    <div class="ms-1 mt-1 mb-4">

                        <div class="flex justify-between items-center mb-4">
                            <a href="{{ route('users.create') }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow">
                                + Tambah Pengguna
                            </a>

                            <form method="GET" action="{{ route('users.index') }}" class="flex items-center gap-2">
                                <input type="text" name="search" placeholder="Cari pengguna..."
                                    value="{{ request('search') }}"
                                    class="ml-4 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 text-sm">
                                <button type="submit"
                                    class="ms-3 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                                    Cari
                                </button>
                            </form>
                        </div>

                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">NPM / NIDN
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Prodi</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Telepon</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Peran</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($users as $index => $user)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $user->identity_number }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $user->study_program }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $user->phone }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 capitalize">{{ $user->role }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        @if ($user->is_approved)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Disetujui
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Belum
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 capitalize">

                                        <form action="{{ route('user.approve', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('POST')
                                            <button type="submit"
                                                class="{{ $user->is_approved ? 'text-red-600 hover:text-red-800' : 'text-green-600 hover:text-green-800' }} bg-transparent border-none p-0 cursor-pointer"
                                                title="{{ $user->is_approved ? 'Batalkan Persetujuan' : 'Setujui' }}">
                                                <i
                                                    class="bi {{ $user->is_approved ? 'bi-x-square' : 'bi-check-square' }}"></i>
                                            </button>
                                        </form>

                                        <button type="button" class="text-red-600 hover:text-red-800" title="Hapus"
                                            onclick="deleteUser({{ $user->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-4 text-center text-sm text-gray-500">Tidak ada
                                        data pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteUser(userId) {
            Swal.fire({
                title: 'Yakin ingin menghapus pengguna ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }

        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const columns = row.querySelectorAll("td");
                let found = false;

                columns.forEach(column => {
                    if (column.textContent.toLowerCase().includes(filter)) {
                        found = true;
                    }
                });

                row.style.display = found ? "" : "none";
            });
        }
    </script>
</x-app-layout>
