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
        Schema::create('kaks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis'); // bikin jenis di constants aja yaa
            $table->string('judul');
            $table->longText('latar_belakang');
            $table->longText('tujuan');
            $table->longText('target');
            $table->longText('metode')->nullable();
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tgl'); // tanggal disahkan
            $table->longText('lampiran')->nullable();
            $table->string('file_lampiran')->nullable();
            $table->integer('tim');
            $table->integer('ppk')->length(3);
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('kaks_poks', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('poks_id');
            $table->foreign('poks_id')
                ->references('id')
                ->on('poks')
                ->onDelete('cascade');
            $table->integer('volume')->length(5);
            $table->string('satuan')->length(10);
            $table->integer('harga');
        });

        Schema::create('kaks_perjadin', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('pegawais_id');
            $table->foreign('pegawais_id')
                ->references('id')
                ->on('pegawais')
                ->onDelete('cascade');
        });

        Schema::create('kaks_spesifikasi', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->string('rincian');
            $table->float('volume');
            $table->string('satuan')->length(20);
            $table->string('spesifikasi');
        });

        Schema::create('kaks_pelatihan', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->longText('peserta');
            $table->longText('waktu_tempat');
            $table->boolean('konsumsi');
            $table->boolean('akomodasi');
            $table->boolean('translok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaks');
        Schema::dropIfExists('kaks_poks');
        Schema::dropIfExists('kaks_perjadin');
        Schema::dropIfExists('kaks_spesifikasi');
        Schema::dropIfExists('kaks_pelatihan');
    }
};
