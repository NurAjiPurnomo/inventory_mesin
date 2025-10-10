<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-xl shadow-lg border border-red-500">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-black" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500" 
                    type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-black" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Kata Sandi')" class="text-black" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500" 
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-black" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-black" />

                <x-text-input id="password_confirmation" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500" 
                    type="password" name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-black" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-red-500 hover:bg-red-600 active:bg-yellow-400 text-white">
                    {{ __('Reset Kata Sandi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
