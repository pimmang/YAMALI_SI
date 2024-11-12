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
        Schema::create('hasil_pengobatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ternotifikasi_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_mulai_pendampingan');
            $table->date('tanggal_mulai_pengobatan')->nullable();
            // $table->date('bulan_lapor_hasil_pengobatan');
            $table->date('tanggal_hasil_pengobatan')->nullable();
            $table->string('hasil_pengobatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pengobatans');
    }
};
