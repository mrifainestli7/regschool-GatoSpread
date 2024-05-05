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
        Schema::create('tahunajar', function (Blueprint $table) {
            $table->id('id_thnAjar');
            $table->string('namaKepsek');
            $table->string('noHpKepsep');
            $table->integer('jmlGuruHonor');
            $table->integer('jmlGuruPNS');
            $table->integer('jmlRombel');
            $table->integer('jmlMurid');
            $table->unsignedBigInteger('id_sekolah');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolah')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_ajars');
    }
};