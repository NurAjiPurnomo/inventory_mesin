<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.reservations.index') }}"
               class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">
                ← Kembali
            </a>
        </div>

        <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
            @csrf
            @method('PUT')

            {{-- Nama Depan --}}
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $reservation->first_name) }}"
                       class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                @error('first_name')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nama Belakang --}}
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $reservation->last_name) }}"
                       class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                @error('last_name')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $reservation->email) }}"
                       class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                @error('email')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-4">
                <label for="tel_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="tel_number" name="tel_number" value="{{ old('tel_number', $reservation->tel_number) }}"
                       class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                @error('tel_number')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal Reservasi --}}
            <div class="mb-4">
                <label for="res_date" class="block text-sm font-medium text-gray-700">Tanggal Reservasi</label>
                <input type="datetime-local" id="res_date" name="res_date"
                       value="{{ old('res_date', $reservation->res_date->format('Y-m-d\TH:i')) }}"
                       class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                @error('res_date')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jumlah Tamu --}}
            <div class="mb-4">
                <label for="guest_number" class="block text-sm font-medium text-gray-700">Jumlah Tamu</label>
                <input type="number" id="guest_number" name="guest_number" value="{{ old('guest_number', $reservation->guest_number) }}"
                       class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                @error('guest_number')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Pilih Meja --}}
            <div class="mb-6">
                <label for="table_id" class="block text-sm font-medium text-gray-700">Pilih Meja</label>
                <select id="table_id" name="table_id" class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm">
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}" @selected(old('table_id', $reservation->table_id) == $table->id)>
                            {{ $table->name }} ({{ $table->guest_number }} Tamu)
                        </option>
                    @endforeach
                </select>
                @error('table_id')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div>
                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-semibold">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</x-admin-layout>
