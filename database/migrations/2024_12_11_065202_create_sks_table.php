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
            $table->string('no')->length(50);
            $table->string('mak')->length(30);
            $table->string('tentang');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->date('tgl_berlaku');
            $table->date('tgl_ditetapkan');
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('sks_honor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sks_id');
            $table->string('uraian');
            $table->integer('honor')->length(8);
        });

        Schema::create('sks_petugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sks_id');
            $table->string('status')->length(2);
            $table->string('mitra_id')->length(5)->nullable();
            $table->string('pegawai_id')->length(5)->nullable();
            $table->string('sebagai');
            $table->string('keterangan')->nullable();
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
