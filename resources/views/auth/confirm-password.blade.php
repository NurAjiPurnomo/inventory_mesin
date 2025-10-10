<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-xl shadow-lg border border-red-500">
        <div class="mb-4 text-sm text-black">
            {{ __('Ini adalah area aman dari aplikasi. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Kata Sandi')" class="text-black" />

                <x-text-input id="password" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-black" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button class="bg-red-500 hover:bg-red-600 active:bg-yellow-400 text-white">
                    {{ __('Konfirmasi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
