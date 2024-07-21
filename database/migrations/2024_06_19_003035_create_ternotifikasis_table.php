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
        Schema::create('ternotifikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('terduga_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('kader_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('nama_petugas_pkm');
            $table->string('nama_pmo');
            $table->string('no_telepon_pmo');
            $table->string('tipe_pmo');
            $table->boolean('edukasi_hiv');
            $table->date('tgl_verifikasi');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ternotifikasis');
    }
};
