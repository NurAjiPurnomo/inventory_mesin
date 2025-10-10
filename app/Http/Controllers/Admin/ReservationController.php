<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Menampilkan daftar semua reservasi.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Menampilkan form untuk membuat reservasi baru.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Tersedia)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Menyimpan data reservasi baru ke dalam database.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);

        // Validasi jumlah tamu melebihi kapasitas meja
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Silakan pilih meja sesuai dengan jumlah tamu.');
        }

        $request_date = Carbon::parse($request->res_date);

        // Cek apakah meja sudah dipesan pada tanggal yang sama
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Meja ini sudah dipesan pada tanggal tersebut.');
            }
        }

        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    /**
     * Menampilkan form untuk mengedit data reservasi.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Tersedia)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Memperbarui data reservasi di database.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);

        // Validasi jumlah tamu melebihi kapasitas meja
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Silakan pilih meja sesuai dengan jumlah tamu');
        }

        $request_date = Carbon::parse($request->res_date);

        // Cek apakah meja sudah dipesan oleh reservasi lain di tanggal yang sama
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Meja ini sudah dipesan pada tanggal tersebut');
            }
        }

        $reservation->update($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Reservasi berhasil diperbarui');
    }

    /**
     * Menghapus data reservasi dari database.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservations.index')->with('warning', 'Reservasi berhasil dihapus');
    }
}
