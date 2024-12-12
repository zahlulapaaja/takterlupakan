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
        Schema::create('sks', function (Blueprint $table) {
            $table->id();
            $table->string('mak');
            $table->string('judul');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->date('tgl_berlaku');
            $table->date('tgl_ditetapkan');
            $table->string('petugas');
            // $table->foreignId();
            $table->timestamps();
        });

        Schema::create('sks_honor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sks_id');
            $table->string('uraian');
            $table->integer('honor');
            $table->timestamps();
        });

        Schema::create('sks_petugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sks_id');
            $table->string('mitra_id')->nullable();
            $table->string('pegawai_id')->nullable();
            $table->string('sebagai');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sks');
        Schema::dropIfExists('sks_honor');
        Schema::dropIfExists('sks_petugas');
    }
};