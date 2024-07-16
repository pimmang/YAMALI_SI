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
        Schema::create('terdugas', function (Blueprint $table) {
            $table->id();
            $table->boolean('mulai_kembali_berobat');
            // $table->string('kegiatan_ik')->nullable();
            // $table->string('jenis_penyuluhan')->nullable();
            $table->string('nama_petugas_tbc');
            $table->string('no_telepon_petugas_tbc');
            $table->date('tgl_hasil_pemeriksaan_dahak');
            $table->boolean('covid_19');
            $table->string('tipe_pemeriksaan');
            $table->foreignId('kontak_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terdugas');
    }
};
