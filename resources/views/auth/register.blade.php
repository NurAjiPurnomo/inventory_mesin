<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-xl shadow-lg border border-red-500">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Nama')" class="text-black" />
                <x-text-input id="name" class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-black" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-black" />
                <x-text-input id="email" class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-black" />
            </div>

            <!-- Kata Sandi -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Kata Sandi')" class="text-black" />
                <x-text-input id="password" class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-black" />
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-black" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-black" />
            </div>

            <!-- Bawah -->
            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-red-600 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>

                <x-primary-button class="ml-4 bg-red-500 hover:bg-red-600 active:bg-yellow-400 text-white">
                    {{ __('Daftar') }}
                </x-primary-button>

            </div>
        </form>
    </div>
</x-guest-layout>