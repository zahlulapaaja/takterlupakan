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
        Schema::create('no_fps', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('rincian');
            $table->date('tgl');
            $table->integer('tahun');
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('perjadin_fp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('no_fps_id');
            $table->foreignId('pegawais_id');
            $table->string('no');
            $table->string('rincian');
            $table->date('tgl');
            $table->timestamps();
        });

        Schema::create('no_surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim');
            $table->string('no_masuk');
            $table->date('tgl_surat');
            $table->string('rincian');
            $table->string('keterangan')->nullable();
        });

        Schema::create('no_surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('rincian');
            $table->string('tujuan');
            $table->string('keterangan')->nullable();
        });

        Schema::create('no_surat_masuk_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('jenis');
            $table->foreignId('no_surat_masuks_id')->nullable();
            $table->foreignId('no_surat_keluars_id')->nullable();
            $table->date('tgl');
            $table->integer('tahun');
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('no_surat_tims', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->date('tgl');
            $table->string('rincian');
            $table->string('keterangan')->nullable();
            $table->integer('tahun');
            $table->string('tim');
            $table->string('jenis');
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('no_fps');
        Schema::dropIfExists('perjadin_fp');
        Schema::dropIfExists('no_surat_masuks');
        Schema::dropIfExists('no_surat_keluars');
        Schema::dropIfExists('no_surat_masuk_keluar');
        Schema::dropIfExists('no_surat_tims');
    }
};
