<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data Admin</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" class="mt-1 block w-full border rounded-md p-2"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="mt-1 block w-full border rounded-md p-2"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Password (opsional)</label>
                    <input type="password" name="password" class="mt-1 block w-full border rounded-md p-2">
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-300 rounded-md mr-2">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
