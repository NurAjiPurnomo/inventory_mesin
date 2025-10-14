<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanBarang;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = PeminjamanBarang::with('barang')->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.peminjaman.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input form
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'no_wa' => 'required',
            'mata_kuliah' => 'required',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'nama_admin' => 'required',
        ]);

        // 2️⃣ Ambil barang yang dipinjam
        $barang = Barang::findOrFail($request->barang_id);

        // 3️⃣ Cek apakah stok cukup
        if ($barang->stok < $request->jumlah_pinjam) {
            return back()->with('error', 'Stok barang tidak mencukupi!');
        }

        // 4️⃣ Kurangi stok barang
        $barang->stok -= $request->jumlah_pinjam;
        $barang->save();

        // 5️⃣ Simpan data peminjaman ke tabel peminjaman_barangs
        PeminjamanBarang::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas' => $request->kelas,
            'no_wa' => $request->no_wa,
            'mata_kuliah' => $request->mata_kuliah,
            'barang_id' => $request->barang_id,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'nama_admin' => $request->nama_admin,
            'keterangan' => $request->keterangan,
            'aksi' => 'Dipinjam',
        ]);

        // 6️⃣ Kembalikan ke halaman daftar peminjaman
        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Peminjaman berhasil disimpan dan stok barang dikurangi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeminjamanBarang $peminjamanBarang)
    {
        $peminjamanBarang->load('barang');
        return view('admin.peminjaman.show', compact('peminjamanBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeminjamanBarang $peminjamanBarang)
    {
        $barang = Barang::all();
        return view('admin.peminjaman.edit', compact('peminjamanBarang', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeminjamanBarang $peminjamanBarang)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'no_wa' => 'required',
            'mata_kuliah' => 'required',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'nama_admin' => 'required',
        ]);

        $oldJumlah = $peminjamanBarang->jumlah_pinjam;
        $newJumlah = $request->jumlah_pinjam;
        $barangIdChanged = $peminjamanBarang->barang_id != $request->barang_id;

        if ($barangIdChanged) {
            // Restore stock for old barang
            $oldBarang = Barang::findOrFail($peminjamanBarang->barang_id);
            $oldBarang->stok += $oldJumlah;
            $oldBarang->save();

            // Check and subtract for new barang
            $newBarang = Barang::findOrFail($request->barang_id);
            if ($newBarang->stok < $newJumlah) {
                return back()->with('error', 'Stok barang baru tidak mencukupi!');
            }
            $newBarang->stok -= $newJumlah;
            $newBarang->save();
        } else {
            // Same barang, adjust stock difference
            $delta = $oldJumlah - $newJumlah;
            $barang = Barang::findOrFail($peminjamanBarang->barang_id);
            $barang->stok += $delta;
            $barang->save();
        }

        $peminjamanBarang->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas' => $request->kelas,
            'no_wa' => $request->no_wa,
            'mata_kuliah' => $request->mata_kuliah,
            'barang_id' => $request->barang_id,
            'jumlah_pinjam' => $newJumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'nama_admin' => $request->nama_admin,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeminjamanBarang $peminjamanBarang)
    {
        // Restore stock
        $barang = Barang::findOrFail($peminjamanBarang->barang_id);
        $barang->stok += $peminjamanBarang->jumlah_pinjam;
        $barang->save();

        $peminjamanBarang->delete();

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus dan stok dikembalikan.');
    }
}
