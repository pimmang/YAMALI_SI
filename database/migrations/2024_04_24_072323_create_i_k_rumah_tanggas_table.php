<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('i_k_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_data');
            $table->string('fasyankes');
            $table->integer('tahun_index');
            $table->integer('semester_index');
            $table->string('kegiatan_ik')->nullable();
            $table->integer('nomor_register_tbc');
            $table->string('nama_pasien');
            $table->integer('no_terduga')->nullable();
            $table->integer('nik_index');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->integer('umur');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->string('sr');
            $table->string('ssr');
            $table->string('kader');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_k_rumah_tanggas');
    }
};
