<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_perekomendasi',
        'nama_perekomendasi',
        'no_anggota',
        'besar_pinjaman',
        'tgl_rekomendasi'
    ];
}
