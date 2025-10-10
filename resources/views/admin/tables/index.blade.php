<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.tables.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Tambah Meja</a>
            </div>

            <div class="p-4 bg-white rounded shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Daftar Meja</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 bg-white rounded shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Jumlah Tamu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Lokasi
                                </th> -->
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($tables as $table)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        {{ $table->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $table->guest_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $table->status->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('admin.tables.edit', $table->id) }}"
                                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded text-white text-sm">
                                                Edit
                                            </a>
                                            <form method="POST"
                                                action="{{ route('admin.tables.destroy', $table->id) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus meja ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded text-white text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($tables->isEmpty())
                        <p class="text-center text-gray-500 py-4">Belum ada data meja.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
