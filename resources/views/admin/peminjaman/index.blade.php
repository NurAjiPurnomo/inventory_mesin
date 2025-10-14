<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Peminjaman Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.peminjaman.create') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">+ Tambah Peminjaman</a>
            </div>

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                     role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="p-4 bg-white rounded shadow-md overflow-x-auto">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">📦 Daftar Peminjaman Barang</h3>

                <table class="min-w-full divide-y divide-gray-200 bg-white rounded shadow-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No WA</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Daftar Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Jumlah Pinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tanggal Pengembalian</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama Admin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($peminjaman as $p)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $p->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->nim }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->kelas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->no_wa }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->mata_kuliah }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->barang->nama ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->jumlah_pinjam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->tanggal_pinjam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->tanggal_pengembalian }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->nama_admin }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->keterangan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->aksi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('admin.peminjaman.edit', $p->id) }}"
                                           class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 rounded text-white text-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.peminjaman.destroy', $p->id) }}"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded text-white text-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14" class="px-6 py-4 text-center text-gray-500">Belum ada data peminjaman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
