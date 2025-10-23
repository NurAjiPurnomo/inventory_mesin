<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjaman_id',
        'barang_id',
        'jumlah_pinjam',
    ];

    // 🔁 Relasi ke peminjaman (setiap detail milik 1 peminjaman)
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    // 🔁 Relasi ke barang (tiap detail punya 1 barang)
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
