<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Peminjaman Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

  <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Form Peminjaman Barang</h2>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="block mb-1 font-medium">Nama</label>
        <input type="text" name="nama" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <div class="mb-3">
        <label class="block mb-1 font-medium">NIM</label>
        <input type="text" name="nim" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <div class="mb-3">
        <label class="block mb-1 font-medium">Barang</label>
        <select name="barang_id" class="w-full border border-gray-300 rounded p-2" required>
          <option value="">-- Pilih Barang --</option>
          @foreach($barangs as $barang)
            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="block mb-1 font-medium">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <div class="mb-3">
        <label class="block mb-1 font-medium">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        Simpan Peminjaman
      </button>
    </form>
  </div>

</body>
</html>
