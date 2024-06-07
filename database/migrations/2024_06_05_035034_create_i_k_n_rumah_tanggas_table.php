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
        Schema::create('i_k_n_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('i_k_rumah_tangga_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('lokasi_penyuluhan');
            $table->date('tgl_penyuluhan');
            $table->string('waktu_penyuluhan');
            $table->string('jenis_penyuluhan');
            $table->char('province_id', 36);
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('restrict')->onUpdate('cascade');
            $table->char('regency_id', 36);
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('restrict')->onUpdate('cascade');
            $table->char('district_id', 36);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('restrict')->onUpdate('cascade');
            $table->string('sr');
            $table->foreignId('ssr_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('kader_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('fasyankes_id')->constrained()->onDelete('restrict')->onUpdate('cascade');   
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_k_n_rumah_tanggas');
    }
};
