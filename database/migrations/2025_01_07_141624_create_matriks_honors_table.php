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
            $table->foreignId('mitras_id');
            $table->string('no')->length(10);
            $table->date('tgl');
            $table->integer('volume')->length(4);
            $table->integer('harga')->length(10);
        });

        Schema::create('matriks_honors_spk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matriks_honors_id');
            $table->string('no')->length(10);
            $table->foreignId('mitras_id');
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
