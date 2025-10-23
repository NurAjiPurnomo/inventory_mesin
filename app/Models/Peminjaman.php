<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';


    protected $fillable = [
        'nama',
        'kelas',
        'no_wa',
        'mata_kuliah',
        'nama_admin',
        'keterangan',
    ];

    // 🔁 Relasi ke detail_peminjamans (1 peminjaman bisa punya banyak detail barang)
    public function details()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
