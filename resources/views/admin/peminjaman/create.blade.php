<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Peminjaman Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-md">
                <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="w-full border rounded px-3 py-2" required>
                        @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Kelas</label>
                        <input type="text" name="kelas" value="{{ old('kelas') }}"
                               class="w-full border rounded px-3 py-2" required>
                        @error('kelas') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">No WA</label>
                        <input type="text" name="no_wa" value="{{ old('no_wa') }}"
                               class="w-full border rounded px-3 py-2" required>
                        @error('no_wa') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" value="{{ old('mata_kuliah') }}"
                               class="w-full border rounded px-3 py-2" required>
                        @error('mata_kuliah') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Barang Dipinjam</label>
                        <select name="barangs[]" multiple class="w-full border rounded px-3 py-2" required>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama_barang }} ({{ $barang->stok }})</option>
                            @endforeach
                        </select>
                        @error('barangs') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Jumlah Pinjam</label>
                        <input type="number" name="jumlah_pinjam" value="{{ old('jumlah_pinjam') }}"
                               class="w-full border rounded px-3 py-2" min="1" required>
                        @error('jumlah_pinjam') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Status</label>
                        <select name="status" id="status" class="w-full border rounded px-3 py-2" onchange="toggleKeterangan()">
                            <option value="diajukan" {{ old('status')=='diajukan' ? 'selected' : '' }}>Diajukan</option>
                            <option value="dipinjam" {{ old('status')=='dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ old('status')=='dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                        @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Keterangan (hanya muncul saat dikembalikan) -->
                    <div class="mb-4" id="keterangan-container" style="display: none;">
                        <label class="block text-gray-700 font-medium mb-1">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('keterangan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleKeterangan() {
            const status = document.getElementById('status').value;
            const keteranganContainer = document.getElementById('keterangan-container');
            if (status === 'dikembalikan') {
                keteranganContainer.style.display = 'block';
            } else {
                keteranganContainer.style.display = 'none';
            }
        }

        // Panggil sekali saat load untuk old input
        toggleKeterangan();
    </script>
</x-admin-layout>
