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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_anggota');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('nik', '16');
            $table->string('pekerjaan');
            $table->string('institusi');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->string('atas_nama');
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
        Schema::dropIfExists('anggotas');
    }
};
