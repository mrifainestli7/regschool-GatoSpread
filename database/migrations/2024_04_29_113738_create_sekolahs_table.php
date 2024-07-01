<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('npsn');
            $table->string('nama_sekolah');
            $table->text('deskripsi');
            $table->enum('status', ['Negeri', 'Swasta'])->default('Negeri');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan_desa');
            $table->unsignedBigInteger('id_kecamatan');
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan');
            $table->string('kode_pos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};