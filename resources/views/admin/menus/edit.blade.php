<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tombol Kembali ke Daftar Menu --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">← Kembali</a>
            </div>

            {{-- Formulir Ubah Menu (tanpa kotakan luar) --}}
            <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Menu --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Menu</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $menu->name) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    @error('name')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Gambar Menu --}}
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar Menu</label>
                    <div class="mt-2 mb-2">
                        <img src="{{ Storage::url($menu->image) }}" alt="Gambar Menu" class="w-32 h-32 rounded border">
                    </div>
                    <input type="file" id="image" name="image"
                        class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm" />
                    @error('image')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Harga Menu --}}
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                    <input type="number" min="0" step="0.01" id="price" name="price"
                        value="{{ old('price', $menu->price) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm" />
                    @error('price')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi Menu --}}
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm">{{ old('description', $menu->description) }}</textarea>
                    @error('description')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
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
