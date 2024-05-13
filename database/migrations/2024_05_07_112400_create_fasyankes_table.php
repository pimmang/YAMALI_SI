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
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('sr');
            $table->string('ssr');
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
