<x-layout-auth>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6" autocomplete="off">
        @csrf

        <!-- Header -->
        <div class="text-center mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Selamat Datang Kembali</h2>
            <p class="text-sm text-gray-600 mt-1 sm:mt-2">Masukkan kredensial Anda untuk mengakses akun</p>
        </div>

        <!-- NIM/NIDN -->
        <div>
            <x-input-label for="identity_number" :value="__('NPM/NIDN')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-person text-gray-400"></i>
                </div>
                <x-text-input id="identity_number"
                    class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    type="number" name="identity_number" :value="old('identity_number')" required autofocus autocomplete="username"
                    placeholder="Masukkan NPM/NIDN Anda" />
            </div>
            <x-input-error :messages="$errors->get('identity_number')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-lock text-gray-400"></i>
                </div>
                <x-text-input id="password"
                    class="block w-full pl-10 p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="Masukkan Password Anda" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 gap-3">
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox"
                    class="h-4 sm:h-5 w-4 sm:w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
            </div>
            <div class="text-sm">
                <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">Lupa
                    password?</a>
            </div>
        </div>

        <!-- Login Button -->
        <div class="mt-6 sm:mt-8">
            <button type="submit"
                class="w-full flex justify-center items-center px-4 py-2.5 sm:py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                <i class="bi bi-box-arrow-in-right mr-2"></i> {{ __('Masuk') }}
            </button>
        </div>

        <!-- Register Link -->
        <div class="mt-6 sm:mt-8 text-center">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </form>
</x-layout-auth>
