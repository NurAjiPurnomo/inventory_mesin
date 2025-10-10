<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang Rusak
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.barang_rusak.index') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">← Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.barang_rusak.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="barang_id" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <select name="barang_id" id="barang_id" class="block w-full border-gray-300 rounded-md">
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama }} (Stok: {{ $barang->stok }})</option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Rusak</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" class="block w-full border-gray-300 rounded-md">
                    @error('jumlah')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3" class="block w-full border-gray-300 rounded-md"></textarea>
                    @error('keterangan')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
