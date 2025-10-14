<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('peminjaman_barangs', function (Blueprint $table) {
            $table->id();

            // Data peminjam
            $table->string('nama');
            $table->string('nim');
            $table->string('kelas');
            $table->string('no_wa');
            $table->string('mata_kuliah');

            // Relasi ke tabel barang
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');

            // Jumlah pinjam dan tanggal
            $table->integer('jumlah_pinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_pengembalian')->nullable();

            // Nama admin pemroses
            $table->string('nama_admin');

            // Keterangan tambahan
            $table->text('keterangan')->nullable();

            // Kolom aksi (misalnya: Dipinjam, Dikembalikan, Hilang, Rusak, dll)
            $table->enum('aksi', ['Dipinjam', 'Dikembalikan', 'Hilang', 'Rusak'])->default('Dipinjam');

            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barangs');
    }
};
