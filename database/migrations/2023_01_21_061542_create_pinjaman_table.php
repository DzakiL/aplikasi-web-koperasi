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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota');
            $table->string('besar_pinjaman');
            $table->string('margin');
            $table->string('total');
            $table->string('keperluan');
            $table->string('angsuran');
            $table->string('bulan_mulai');
            $table->string('bulan_selesai');
            $table->string('angsuran_pokok');
            $table->string('angsuran_margin');
            $table->string('jumlah_angsuran');
            $table->string('banyak_angsuran');
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
        Schema::dropIfExists('pinjamen');
    }
};
