<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('indices', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_data');
            $table->string('type_fasyankes');
            $table->string('tahun_index');
            $table->string('semester_index');
            $table->string('nomor_register_tbc')->nullable();
            $table->string('nama_pasien');
            $table->string('no_terduga')->nullable();
            $table->string('nik_index');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->foreignId('ssr_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('alamat');
            $table->foreignId('fasyankes_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->char('regency_id', 36);
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('restrict')->onUpdate('cascade');
            $table->char('district_id', 36);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indices');
    }
};
