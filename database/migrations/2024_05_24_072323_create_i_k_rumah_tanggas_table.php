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
        Schema::create('i_k_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('index_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kader_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('fasyankes_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            // $table->foreignId('fasyankes_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('kegiatan_ik')->nullable();
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
