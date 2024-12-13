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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poks_id');
            $table->string('nama');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->timestamps();
        });

        Schema::create('pjks', function (Blueprint $table) {
            $table->id();
            $table->string('mak');
            $table->string('tahun');
            $table->foreignId('pjk')->constrained(
                table: 'pegawais',
                indexName: 'id'
            );
        });

        Schema::create('alokasi_bebans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatans_id');
            $table->foreignId('sks_petugas_id');
            $table->integer('beban');
            $table->string('melakukan');
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
