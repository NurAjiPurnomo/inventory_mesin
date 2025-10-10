<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tombol Kembali ke Daftar Barang --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.barangs.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">← Kembali</a>
            </div>

            {{-- Formulir Ubah Barang --}}
            <form method="POST" action="{{ route('admin.barangs.update', $barang->id) }}">
                @csrf
                @method('PUT')

                {{-- Nama Barang --}}
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $barang->nama) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    @error('nama')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Stok Barang --}}
                <div class="mb-6">
                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" id="stok" name="stok" min="0" value="{{ old('stok', $barang->stok) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    @error('stok')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Simpan --}}
                <div class="text-right">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-admin-layout>
