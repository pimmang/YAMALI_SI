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
        Schema::create('fasyankes', function (Blueprint $table) {
            $table->id();
            $table->string('kode_fasyankes');
            $table->string('nama_fasyankes');
            $table->string('jenis');
            $table->string('pmdt');
            // $table->char('province_id', 36);
            // $table->foreign('province_id')->references('id')->on('provinces')->onDelete('restrict')->onUpdate('cascade');
            $table->char('regency_id', 36);
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('restrict')->onUpdate('cascade');
            $table->char('district_id', 36);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('restrict')->onUpdate('cascade');
            $table->string('alamat');
            // $table->string('sr');
            $table->foreignId('ssr_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasyankes');
    }
};
