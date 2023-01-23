<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelunasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_anggota',
        'piutang',
        'banyak_angsuran',
        'angsuran_ke',
        'angsuran_sisa',
        'pokok',
        'jasa',
        'jumlah_angsuran',
        'sisa_piutang',
        'periode_pinjaman'
    ];
}
