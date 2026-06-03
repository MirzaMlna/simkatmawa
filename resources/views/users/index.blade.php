<x-app-layout>
    <!-- Modern Header Section -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Pengguna</h1>
                <p class="text-gray-600 text-lg">Kelola pengguna sistem dan status persetujuan mereka</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <p class="font-semibold">Ada data yang perlu diperbaiki:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <!-- Action Bar -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <div class="flex flex-col gap-4">
                            <a href="{{ route('users.create') }}"
                                class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg shadow-sm transition-colors w-full sm:w-auto">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Pengguna
                            </a>

                            <form method="GET" action="{{ route('users.index') }}" class="flex flex-col sm:flex-row gap-3">
                                <div class="relative flex-1">
                                    <input type="text" name="search" placeholder="Cari pengguna..."
                                        value="{{ request('search') }}"
                                        class="pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors w-full">
                                    <svg class="absolute left-3 top-3.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <button type="submit"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg transition-colors w-full sm:w-auto">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Modern Table -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200" style="min-width: 800px;">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">NPM / NIDN</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Prodi</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Telepon</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Peran</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Status</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $index => $user)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-3 sm:px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-3 sm:px-6 py-4 text-sm text-gray-900 font-mono whitespace-nowrap">{{ $user->identity_number }}</td>
                                        <td class="px-3 sm:px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-3 sm:px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $user->study_program }}</td>
                                        <td class="px-3 sm:px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $user->phone }}</td>
                                        <td class="px-3 sm:px-6 py-4 text-sm whitespace-nowrap">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $user->role === 'Admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                        <td class="px-3 sm:px-6 py-4 text-sm whitespace-nowrap">
                                            @if ($user->is_approved)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Disetujui
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Menunggu
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-3 sm:px-6 py-4 text-sm whitespace-nowrap">
                                            <div class="flex flex-col sm:flex-row items-center gap-2">
                                                <form action="{{ route('user.approve', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-3 py-1.5 {{ $user->is_approved ? 'bg-red-100 hover:bg-red-200 text-red-700' : 'bg-green-100 hover:bg-green-200 text-green-700' }} rounded-lg text-xs font-medium transition-colors"
                                                        title="{{ $user->is_approved ? 'Batalkan Persetujuan' : 'Setujui' }}">
                                                        @if($user->is_approved)
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Batalkan
                                                        @else
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Setujui
                                                        @endif
                                                    </button>
                                                </form>

                                                @if($user->role === 'Mahasiswa')
                                                    <button type="button"
                                                        class="inline-flex items-center px-3 py-1.5 bg-amber-100 hover:bg-amber-200 text-amber-700 rounded-lg text-xs font-medium transition-colors"
                                                        title="Reset Password" onclick="resetPassword({{ $user->id }})">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14H8v2H6v2H2v-4.586l4.257-4.257A6 6 0 1118 8zm-6-4a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Reset
                                                    </button>

                                                    <form id="reset-password-form-{{ $user->id }}" action="{{ route('users.reset-password', $user) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="password">
                                                        <input type="hidden" name="password_confirmation">
                                                    </form>
                                                @endif

                                                <button type="button" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg text-xs font-medium transition-colors"
                                                    title="Hapus" onclick="deleteUser({{ $user->id }})">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Hapus
                                                </button>

                                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-3 sm:px-6 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                                <h3 class="text-lg font-medium text-gray-900 mb-1">Tidak ada pengguna</h3>
                                                <p class="text-gray-500">Belum ada pengguna yang terdaftar dalam sistem.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
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

        function resetPassword(userId) {
            Swal.fire({
                title: 'Reset password mahasiswa',
                html: `
                    <div class="space-y-3 text-left">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password baru</label>
                            <input id="reset-password" type="password" class="swal2-input" style="margin:0;width:100%;" autocomplete="new-password">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi password</label>
                            <input id="reset-password-confirmation" type="password" class="swal2-input" style="margin:0;width:100%;" autocomplete="new-password">
                        </div>
                    </div>
                `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Reset Password',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                focusConfirm: false,
                preConfirm: () => {
                    const password = document.getElementById('reset-password').value;
                    const passwordConfirmation = document.getElementById('reset-password-confirmation').value;

                    if (!password || !passwordConfirmation) {
                        Swal.showValidationMessage('Password dan konfirmasi wajib diisi.');
                        return false;
                    }

                    if (password.length < 6) {
                        Swal.showValidationMessage('Password minimal 6 karakter.');
                        return false;
                    }

                    if (password !== passwordConfirmation) {
                        Swal.showValidationMessage('Konfirmasi password tidak cocok.');
                        return false;
                    }

                    return { password, passwordConfirmation };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('reset-password-form-' + userId);
                    form.querySelector('input[name="password"]').value = result.value.password;
                    form.querySelector('input[name="password_confirmation"]').value = result.value.passwordConfirmation;
                    form.submit();
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
