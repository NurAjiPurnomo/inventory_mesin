<x-admin-layout>

    <div class="py-6 px-4 max-w-4xl mx-auto">
        {{-- Tombol Kembali di kanan --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.tables.index') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">
                ← Kembali
            </a>
        </div>
            <form method="POST" action="{{ route('admin.tables.update', $table->id) }}">
                @csrf
                @method('PUT')

                {{-- Nama Meja --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Meja</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $table->name) }}"
                        class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                    @error('name')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jumlah Tamu --}}
                <div class="mb-4">
                    <label for="guest_number" class="block text-sm font-medium text-gray-700">Jumlah Tamu</label>
                    <input type="number" id="guest_number" name="guest_number" value="{{ old('guest_number', $table->guest_number) }}"
                        class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm" />
                    @error('guest_number')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status Meja --}}
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status Meja</label>
                    <select id="status" name="status" class="mt-1 w-full border border-gray-300 rounded-md py-2 px-3 text-sm">
                        @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{ $status->value }}" {{ old('status', $table->status->value) == $status->value ? 'selected' : '' }}>
                                {{ __($status->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>
               
                {{-- Tombol Simpan di kanan bawah --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
