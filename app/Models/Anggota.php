<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_anggota',
        'tempat_lahir',
        'tgl_lahir',
        'nik',
        'pekerjaan',
        'institusi',
        'alamat',
        'no_hp',
        'nama_bank',
        'no_rekening',
        'atas_nama',
    ];
}
