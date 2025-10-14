<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                     role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">✏️ Edit Data Peminjaman</h3>

                <form action="{{ route('admin.peminjaman.update', $peminjamanBarang->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ $peminjamanBarang->nama }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                            <input type="text" name="nim" id="nim" value="{{ $peminjamanBarang->nim }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="{{ $peminjamanBarang->kelas }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="no_wa" class="block text-sm font-medium text-gray-700 mb-1">No WhatsApp</label>
                            <input type="text" name="no_wa" id="no_wa" value="{{ $peminjamanBarang->no_wa }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="mata_kuliah" class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" value="{{ $peminjamanBarang->mata_kuliah }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="barang_id" class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
                            <select name="barang_id" id="barang_id" required
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Pilih Barang --</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}" {{ $peminjamanBarang->barang_id == $b->id ? 'selected' : '' }}>
                                        {{ $b->nama }} (stok: {{ $b->stok }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="jumlah_pinjam" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pinjam</label>
                            <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" value="{{ $peminjamanBarang->jumlah_pinjam }}" required min="1"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ $peminjamanBarang->tanggal_pinjam }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ $peminjamanBarang->tanggal_pengembalian }}" required
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="nama_admin" class="block text-sm font-medium text-gray-700 mb-1">Nama Admin</label>
                            <input type="text" name="nama_admin" id="nama_admin" value="{{ $peminjamanBarang->nama_admin }}" readonly
                                   class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                        </div>

                        <div class="md:col-span-2">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3"
                                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $peminjamanBarang->keterangan }}</textarea>
                        </div>
                    </div>

                    <div class="flex space-x-4 pt-4">
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Update</button>
                        <a href="{{ route('admin.peminjaman.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 rounded-lg text-white">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</x-admin-layout>
