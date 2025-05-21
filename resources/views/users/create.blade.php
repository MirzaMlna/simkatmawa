<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Pengguna
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-4" autocomplete="off">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">NPM / NIDN</label>
                    <input type="number" name="identity_number" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Program Studi</label>
                    <select id="study_program" name="study_program"
                        class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="number" name="phone" value="" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" autocomplete="new-password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Peran</label>
                    <select name="role"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('users.index') }}"
                        class="mr-2 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-md">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
