<x-layout-auth>
    <form method="POST" action="{{ route('register') }}" autocomplete="off" class="space-y-4 sm:space-y-5">
        @csrf

        <!-- Header -->
        <div class="text-center mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
            <p class="text-sm text-gray-600 mt-1 sm:mt-2">Lengkapi data diri Anda untuk mendaftar</p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-person text-gray-400"></i>
                </div>
                <x-text-input id="name" class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                    placeholder="Masukkan nama lengkap Anda" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Identity Number -->
        <div class="mt-4">
            <x-input-label for="identity_number" :value="__('NPM / NIDN')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-card-heading text-gray-400"></i>
                </div>
                <x-text-input id="identity_number" class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                    type="text" name="identity_number" :value="old('identity_number')" required 
                    placeholder="Masukkan NPM/NIDN Anda" />
            </div>
            <x-input-error :messages="$errors->get('identity_number')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Study Program -->
        <div class="mt-4">
            <x-input-label for="study_program" :value="__('Program Studi')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-book text-gray-400"></i>
                </div>
                <select id="study_program" name="study_program"
                    class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
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
                    <option value="Hukum Ekonomi Syari'ah">Hukum Ekonomi Syari'ah</option>
                    <option value="Ekonomi Syari'ah">Ekonomi Syari'ah</option>
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
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="bi bi-chevron-down text-gray-400"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('study_program')" class="mt-2 text-red-600 text-sm" />
        </div>


        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Nomor HP')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-phone text-gray-400"></i>
                </div>
                <x-text-input id="phone" class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                    type="text" name="phone" :value="old('phone')" required 
                    placeholder="Masukkan nomor HP Anda" />
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Password and Confirm Password in grid for desktop -->
        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700 font-medium" />
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="bi bi-lock text-gray-400"></i>
                    </div>
                    <x-text-input id="password" class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        type="password" name="password" required autocomplete="new-password" 
                        placeholder="Minimal 8 karakter" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-gray-700 font-medium" />
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="bi bi-shield-lock text-gray-400"></i>
                    </div>
                    <x-text-input id="password_confirmation" class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        type="password" name="password_confirmation" required autocomplete="new-password" 
                        placeholder="Ulangi kata sandi Anda" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm" />
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="mt-6 sm:mt-8">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" required class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="text-gray-600">Saya menyetujui <a href="#" class="text-blue-600 hover:underline">syarat dan ketentuan</a> yang berlaku</label>
                </div>
            </div>
        </div>

        <!-- Register Button -->
        <div class="mt-6 sm:mt-8">
            <button type="submit" class="w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                <i class="bi bi-person-plus mr-2"></i> {{ __('Daftar Sekarang') }}
            </button>
        </div>

        <!-- Login Link -->
        <div class="mt-6 sm:mt-8 text-center">
            <p class="text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Masuk sekarang
                </a>
            </p>
        </div>
    </form>
</x-layout-auth>
