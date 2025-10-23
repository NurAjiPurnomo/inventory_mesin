<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->string('no_wa');
            $table->string('mata_kuliah');
            $table->enum('status', ['diajukan', 'dipinjam', 'dikembalikan'])->default('diajukan');
            $table->string('nama_admin')->nullable(); // akan diisi otomatis saat status = dipinjam
            $table->text('keterangan')->nullable();   // akan diisi saat status = dikembalikan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
