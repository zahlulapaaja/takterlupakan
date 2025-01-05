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
            $table->string('no')->length(10);
            $table->string('rincian');
            $table->date('tgl');
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
            $table->string('no')->length(10);
            $table->string('jenis')->length(20);
            $table->foreignId('no_surat_masuks_id')->nullable();
            $table->foreignId('no_surat_keluars_id')->nullable();
            $table->date('tgl');
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('no_surat_tims', function (Blueprint $table) {
            $table->id();
            $table->string('no')->length(10);
            $table->date('tgl');
            $table->string('rincian');
            $table->string('keterangan')->nullable();
            $table->string('jenis')->length(10);
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('tim');
            $table->foreign('tim')
                ->references('id')
                ->on('tims')
                ->onDelete('cascade');
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
        Schema::dropIfExists('no_surat_masuks');
        Schema::dropIfExists('no_surat_keluars');
        Schema::dropIfExists('no_surat_masuk_keluar');
        Schema::dropIfExists('no_surat_tims');
    }
};
