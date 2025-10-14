<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'kelas',
        'no_wa',
        'mata_kuliah',
        'barang_id',
        'jumlah_pinjam',
        'tanggal_pinjam',
        'tanggal_pengembalian',
        'nama_admin',
        'keterangan',
        'aksi',
    ];

    // Relasi ke model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
