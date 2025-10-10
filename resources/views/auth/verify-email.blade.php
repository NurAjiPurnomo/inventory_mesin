<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg border border-red-500 text-black">
        <p class="mb-4 text-sm">
            Terima kasih sudah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan lagi.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button class="bg-red-500 hover:bg-red-600 active:bg-yellow-400 text-white">
                    Kirim Ulang Email Verifikasi
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                    class="underline text-sm text-black hover:text-red-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
