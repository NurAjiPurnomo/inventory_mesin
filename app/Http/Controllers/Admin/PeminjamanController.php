<?php

namespace App\Http\Controllers\Admin;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $peminjamans = Peminjaman::with('barangs')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // Form tambah peminjaman
    public function create()
    {
        $barangs = Barang::all();
        return view('admin.peminjaman.create', compact('barangs'));
    }

    // Simpan data peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'no_wa' => 'required|string|max:15',
            'mata_kuliah' => 'required|string|max:100',
            'barangs' => 'required|array',
            'barangs.*' => 'exists:barangs,id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
            'status' => 'nullable|in:diajukan,dipinjam,dikembalikan',
        ]);

        $peminjaman = new Peminjaman();
        $peminjaman->nama = $request->nama;
        $peminjaman->kelas = $request->kelas;
        $peminjaman->no_wa = $request->no_wa;
        $peminjaman->mata_kuliah = $request->mata_kuliah;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->status = $request->status ?? 'diajukan';

        if ($peminjaman->status === 'dipinjam') {
            $peminjaman->nama_admin = Auth::user()->name;
        }

        if ($peminjaman->status === 'dikembalikan') {
            $peminjaman->keterangan = $request->keterangan;
        }

        $peminjaman->save();

        // Simpan relasi ke barang
        $peminjaman->barangs()->attach($request->barangs);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    // Edit data
    public function edit($id)
    {
        $peminjaman = Peminjaman::with('barangs')->findOrFail($id);
        $barangs = Barang::all();
        return view('admin.peminjaman.edit', compact('peminjaman', 'barangs'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'no_wa' => 'required|string|max:15',
            'mata_kuliah' => 'required|string|max:100',
            'barangs' => 'required|array',
            'barangs.*' => 'exists:barangs,id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:diajukan,dipinjam,dikembalikan',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->nama = $request->nama;
        $peminjaman->kelas = $request->kelas;
        $peminjaman->no_wa = $request->no_wa;
        $peminjaman->mata_kuliah = $request->mata_kuliah;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->status = $request->status;

        if ($request->status === 'dipinjam') {
            $peminjaman->nama_admin = Auth::user()->name;
        }

        if ($request->status === 'dikembalikan') {
            $peminjaman->keterangan = $request->keterangan;
        }

        $peminjaman->save();

        // Update relasi barang
        $peminjaman->barangs()->sync($request->barangs);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->barangs()->detach();
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    // Update status saja (opsional)
    public function updateStatus(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'status' => 'required|in:diajukan,dipinjam,dikembalikan',
            'keterangan' => 'nullable|string',
        ]);

        $peminjaman->status = $request->status;

        if ($request->status === 'dipinjam') {
            $peminjaman->nama_admin = Auth::user()->name;
        }

        if ($request->status === 'dikembalikan') {
            $peminjaman->keterangan = $request->keterangan;
        }

        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui.');
    }
}
