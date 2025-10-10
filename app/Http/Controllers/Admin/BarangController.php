<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Tampilkan daftar semua barang.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barangs.index', compact('barangs'));
    }

    /**
     * Tampilkan form tambah barang baru.
     */
    public function create()
    {
        return view('admin.barangs.create');
    }

    /**
     * Simpan barang baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        Barang::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
        ]);

        return to_route('admin.barangs.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail barang (opsional).
     */
    public function show(Barang $barang)
    {
        return view('admin.barangs.show', compact('barang'));
    }

    /**
     * Tampilkan form edit barang.
     */
    public function edit(Barang $barang)
    {
        return view('admin.barangs.edit', compact('barang'));
    }

    /**
     * Perbarui data barang di database.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        $barang->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
        ]);

        return to_route('admin.barangs.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Hapus barang dari database.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return to_route('admin.barangs.index')->with('danger', 'Barang berhasil dihapus.');
    }
}
