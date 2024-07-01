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
        Schema::create('rekap', function (Blueprint $table) {
            $table->id('id_rekap');
            $table->string('akreditasi');
            $table->string('namaKepsek');
            $table->string('noHpKepsek');
            $table->integer('jmlGuruHonor');
            $table->integer('jmlGuruPNS');
            $table->integer('jmlRombel');
            $table->integer('jmlMuridPria');
            $table->integer('jmlMuridWanita');
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
        Schema::dropIfExists('rekap');
    }
};