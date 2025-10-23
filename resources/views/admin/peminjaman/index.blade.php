<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Peminjaman Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.peminjaman.create') }}"
                   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                   + Tambah Peminjaman
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-4 bg-white rounded shadow-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 bg-white rounded shadow-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No. WA</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Barang Dipinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama Admin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($peminjamans as $peminjaman)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->kelas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->no_wa }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->mata_kuliah }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    @foreach ($peminjaman->barangs as $barang)
                                        <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mb-1">
                                            {{ $barang->nama_barang }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->jumlah_pinjam }}</td>

                                <!-- Status + Keterangan -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <form action="{{ route('admin.peminjaman.updateStatus', $peminjaman->id) }}" method="POST">
                                        @csrf
                                        <div class="flex flex-col">
                                            <select name="status" class="border rounded px-2 py-1 text-sm mb-1" 
                                                    onchange="toggleKeterangan(this, {{ $peminjaman->id }})">
                                                <option value="diajukan" {{ $peminjaman->status == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                                                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                            </select>
                                            <input type="text" name="keterangan" id="keterangan-{{ $peminjaman->id }}" 
                                                   class="border rounded px-2 py-1 text-sm mt-1 {{ $peminjaman->status == 'dikembalikan' ? '' : 'hidden' }}" 
                                                   placeholder="Isi keterangan" value="{{ $peminjaman->keterangan }}">
                                            <button type="submit" class="mt-1 px-3 py-1 bg-blue-500 hover:bg-blue-700 text-white rounded text-sm">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->nama_admin ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $peminjaman->keterangan ?? '-' }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('admin.peminjaman.edit', $peminjaman->id) }}"
                                           class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded text-white text-sm">
                                           Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded text-white text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-gray-500 py-4">
                                    Belum ada data peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleKeterangan(select, id) {
            const keteranganInput = document.getElementById('keterangan-' + id);
            if (select.value === 'dikembalikan') {
                keteranganInput.classList.remove('hidden');
            } else {
                keteranganInput.classList.add('hidden');
            }
        }
    </script>
</x-admin-layout>
