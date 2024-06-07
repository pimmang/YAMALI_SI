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
            $table->string('type_fasyankes');
            $table->string('tahun_index');
            $table->string('semester_index');
            $table->string('kegiatan_ik')->nullable();
            $table->string('nomor_register_tbc')->nullable();
            $table->string('nama_pasien');
            $table->string('no_terduga')->nullable();
            $table->string('nik_index');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->integer('umur');
            $table->string('alamat');
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
            // $table->string('latitude');
            // $table->string('longitude');
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
