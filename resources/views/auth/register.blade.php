<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Identity Number -->
        <div class="mt-4">
            <x-input-label for="identity_number" :value="__('NPM / NIDN')" />
            <x-text-input id="identity_number" class="block mt-1 w-full" type="text" name="identity_number"
                :value="old('identity_number')" required />
            <x-input-error :messages="$errors->get('identity_number')" class="mt-2" />
        </div>

        <!-- Study Program -->
        <div class="mt-4">
            <x-input-label for="study_program" :value="__('Program Studi')" class="text-gray-700 mb-1" />
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


        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Nomor HP')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
