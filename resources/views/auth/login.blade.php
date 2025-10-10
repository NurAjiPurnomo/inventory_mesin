<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-xl shadow-lg border border-red-500">
        <x-auth-session-status class="mb-4 text-black" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-black" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500" 
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-black" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Kata Sandi')" class="text-black" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500" 
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-black" />
            </div>

            <!-- Ingat Saya -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-black">
                    <input id="remember_me" type="checkbox" 
                        class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                    <span class="ml-2 text-sm">{{ __('Ingat Saya') }}</span>
                </label>
            </div>

            <!-- Aksi -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-red-600 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" 
                       href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3 bg-red-500 hover:bg-red-600 active:bg-yellow-400 text-white">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
