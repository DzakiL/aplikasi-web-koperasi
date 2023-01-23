<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelunasans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_anggota');
            $table->integer('piutang');
            $table->integer('banyak_angsuran');
            $table->integer('angsuran_ke');
            $table->integer('angsuran_sisa');
            $table->integer('pokok');
            $table->integer('jasa');
            $table->integer('jumlah_angsuran');
            $table->integer('sisa_piutang');
            $table->integer('periode_pinjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelunasans');
    }
};
