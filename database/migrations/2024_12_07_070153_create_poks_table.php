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
            $table->string('kode_program')->length(10);
            $table->string('program');
            $table->string('kode_kegiatan')->length(10);
            $table->string('kegiatan');
            $table->string('kode_output')->length(10);
            $table->string('output');
            $table->string('kode_suboutput')->length(10);
            $table->string('suboutput');
            $table->string('kode_komponen')->length(10);
            $table->string('komponen');
            $table->string('kode_subkomponen')->length(10);
            $table->string('subkomponen');
            $table->string('kode_akun')->length(10);
            $table->string('akun');
            $table->string('item_kegiatan');
            $table->integer('volume')->length(4);
            $table->string('satuan')->length(20);
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('tahun')->length(4);
            $table->integer('revisi')->length(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poks');
    }
};
