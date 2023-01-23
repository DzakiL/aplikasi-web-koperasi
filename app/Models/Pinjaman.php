<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $fillable = [
        'no_anggota',
        'besar_pinjaman',
        'margin',
        'total',
        'keperluan',
        'angsuran',
        'bulan_mulai',
        'bulan_selesai',
        'angsuran_pokok',
        'angsuran_margin',
        'jumlah_angsuran',
        'banyak_angsuran'
    ];
}
