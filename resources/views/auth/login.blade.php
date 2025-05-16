<x-guest-layout>

    <form method="POST" action="{{ route('login') }}" class="space-y-6" autocomplete="off">
        @csrf
        <!-- NIM/NIDN -->
        <div>
            <x-input-label for="identity_number" :value="__('NPM/NIDN')" />
            <x-text-input id="identity_number"
                class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                type="number" name="identity_number" :value="old('identity_number')" required autofocus autocomplete="username"
                placeholder="Masukkan NPM/NIDN Anda" />
            <x-input-error :messages="$errors->get('identity_number')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                type="password" name="password" required autocomplete="current-password"
                placeholder="Masukkan Password Anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Register and Button -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 underline">
                    Klik disini
                </a>
            </p>
            <x-primary-button
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md transition-all">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
