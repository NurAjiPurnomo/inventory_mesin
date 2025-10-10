<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangRusak;
use Illuminate\Http\Request;

class BarangRusakController extends Controller
{
    public function index()
    {
        $barangRusaks = BarangRusak::with('barang')->latest()->get();
        return view('admin.barang_rusak.index', compact('barangRusaks'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('admin.barang_rusak.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Pastikan stok cukup
        if ($request->jumlah > $barang->stok) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi.']);
        }

        // Kurangi stok barang
        $barang->decrement('stok', $request->jumlah);

        // Simpan data barang rusak
        BarangRusak::create($request->all());

        return redirect()->route('admin.barang_rusak.index')->with('success', 'Data barang rusak berhasil ditambahkan.');
    }

    public function edit(BarangRusak $barangRusak)
    {
        $barangs = Barang::all();
        return view('admin.barang_rusak.edit', compact('barangRusak', 'barangs'));
    }

    public function update(Request $request, BarangRusak $barangRusak)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Hitung selisih jumlah
        $selisih = $request->jumlah - $barangRusak->jumlah;

        // Jika jumlah bertambah, pastikan stok cukup
        if ($selisih > 0 && $selisih > $barang->stok) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi.']);
        }

        // Update stok barang
        $barang->decrement('stok', $selisih);

        // Update data barang rusak
        $barangRusak->update($request->all());

        return redirect()->route('admin.barang_rusak.index')->with('success', 'Data barang rusak berhasil diperbarui.');
    }

    public function destroy(BarangRusak $barangRusak)
    {
        // Kembalikan stok barang
        $barang = $barangRusak->barang;
        $barang->increment('stok', $barangRusak->jumlah);

        $barangRusak->delete();

        return redirect()->route('admin.barang_rusak.index')->with('success', 'Data barang rusak berhasil dihapus.');
    }
}
