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
        Schema::create('sarpras', function (Blueprint $table) {
            $table->id('id_sarpras');
            $table->integer('jmlh_rk');
            $table->integer('jmlh_perpus');
            $table->integer('jmlh_rguru');
            $table->integer('jmlh_ruks');
            $table->integer('jmlh_toilet');
            $table->integer('jmlh_kantin');
            $table->enum('pagar', ['Belum Terpenuhi', 'Terpenuhi'])->default('Belum Terpenuhi');
            $table->enum('gerbang', ['Belum Terpenuhi', 'Terpenuhi'])->default('Belum Terpenuhi');
            $table->enum('paving', ['Belum Terpenuhi', 'Terpenuhi'])->default('Belum Terpenuhi');
            $table->unsignedBigInteger('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolah')->onDelete('cascade');
            $table->unsignedBigInteger('id_thnAjar');
            $table->foreign('id_thnAjar')->references('id_thnAjar')->on('tahun_ajar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarpras');
    }
};