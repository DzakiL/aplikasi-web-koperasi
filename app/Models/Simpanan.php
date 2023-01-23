<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_anggota',
        'transfer',
        'tanggal',
        'uraian',
        'kode',
        'debit',
        'kredit',
        'saldo'
    ];
}
