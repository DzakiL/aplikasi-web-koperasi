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
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_anggota');
            $table->date('transfer');
            $table->date('tanggal');
            $table->string('uraian');
            $table->string('kode', '1');
            $table->integer('debit');
            $table->integer('kredit')->nullable();
            $table->integer('saldo');
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
        Schema::dropIfExists('simpanans');
    }
};
