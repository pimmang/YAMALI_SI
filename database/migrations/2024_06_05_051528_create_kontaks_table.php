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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kegiatan');
            $table->string('nik_kontak');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('no_telepon');
            $table->integer('umur');
            $table->string('alamat');
            // $table->string('sr');
            // $table->foreignId('ssr_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('jenis_ik');
            $table->boolean('kontak_serumah');
            $table->boolean('batuk');
            $table->boolean('sesak_napas');
            $table->boolean('keringat_malam');
            $table->boolean('demam_meriang');
            $table->boolean('dm');
            $table->boolean('lansia_60_thn');
            $table->boolean('ibu_hamil');
            $table->boolean('perokok');
            $table->boolean('berobat_tidak_tuntas');
            // $table->foreignId('fasyankes_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('hasil_pemeriksaan');
            $table->date('tgl_revisit');
            $table->string('keterangan')->nullable();
            $table->foreignId('i_k_rumah_tangga_id')->nullable()->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('i_k_n_rumah_tangga_id')->nullable()->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('rujukan')->nullable();
            $table->boolean('kunjungan')->nullable();
            $table->boolean('terduga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
