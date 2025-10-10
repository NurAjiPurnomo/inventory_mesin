<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Menampilkan daftar data meja.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Menampilkan form untuk membuat data meja baru.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Menyimpan data meja baru ke database.
     */
    public function store(TableStoreRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'guest_number' => 'required|integer',
            'status' => 'required',
        ]);

        Table::create($validated);

        return to_route('admin.tables.index')->with('success', 'Data meja berhasil dibuat');
    }

    /**
     * Menampilkan detail data meja (jika diperlukan).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form untuk mengubah data meja.
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Memperbarui data meja di database.
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());

        return to_route('admin.tables.index')->with('success', 'Data meja berhasil diperbarui');
    }

    /**
     * Menghapus data meja beserta reservasinya.
     */
    public function destroy(Table $table)
    {
        $table->reservations()->delete();
        $table->delete();

        return to_route('admin.tables.index')->with('success', 'Data meja berhasil dihapus');
    }
}
