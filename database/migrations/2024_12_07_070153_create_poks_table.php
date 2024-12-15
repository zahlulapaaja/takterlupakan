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
        Schema::create('poks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_program')->nullable();
            $table->string('program')->nullable();
            $table->string('kode_kegiatan')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('kode_output')->nullable();
            $table->string('output')->nullable();
            $table->string('kode_suboutput')->nullable();
            $table->string('suboutput')->nullable();
            $table->string('kode_komponen')->nullable();
            $table->string('komponen')->nullable();
            $table->string('kode_subkomponen')->nullable();
            $table->string('subkomponen')->nullable();
            $table->string('kode_akun')->nullable();
            $table->string('akun')->nullable();
            $table->string('item_kegiatan');
            $table->string('volume');
            $table->string('satuan');
            $table->string('harga');
            $table->string('jumlah');
            $table->integer('tahun');
            $table->integer('revisi');
            $table->timestamps();
        });

        // Schema::create('item_kegiatans', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('item_kegiatan');
        //     $table->string('volume');
        //     $table->string('satuan');
        //     $table->string('harga');
        //     $table->string('jumlah');
        //     $table->string('tahun');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poks');
        // Schema::dropIfExists('item_kegiatans');
    }
};
