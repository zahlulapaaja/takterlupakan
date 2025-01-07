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
        Schema::create('matriks_honors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatans_id');
            $table->integer('bulan')->length(2);
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('matriks_honors_bast', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matriks_honors_id');
            $table->string('status')->length(2);
            $table->integer('mitra_id')->length(5)->nullable();
            $table->integer('pegawai_id')->length(5)->nullable();
            $table->string('no')->length(10);
            $table->string('sebagai')->length(50);
            $table->integer('volume')->length(4);
            $table->integer('harga')->length(10);
            $table->integer('tahun')->length(4);
        });

        Schema::create('matriks_honors_spk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matriks_honors_id');
            $table->string('no')->length(10);
            $table->string('status')->length(2);
            $table->integer('mitra_id')->length(5)->nullable();
            $table->integer('pegawai_id')->length(5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriks_honors');
        Schema::dropIfExists('matriks_honors_bast');
        Schema::dropIfExists('matriks_honors_spk');
    }
};
