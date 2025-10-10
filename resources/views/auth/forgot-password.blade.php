<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-xl shadow-lg border border-red-500">
        <div class="mb-4 text-sm text-black">
            {{ __('Lupa kata sandi? Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan untuk mereset kata sandi Anda.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-black" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-black" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border border-red-500 focus:ring-red-500 focus:border-red-500 text-black placeholder-gray-500" 
                    type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-black" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-red-500 hover:bg-red-600 active:bg-yellow-400 text-white">
                    {{ __('Kirim Tautan Reset Kata Sandi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
