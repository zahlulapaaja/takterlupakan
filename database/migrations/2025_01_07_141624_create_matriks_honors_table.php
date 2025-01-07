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
            $table->unsignedBigInteger('kegiatans_id');
            $table->foreign('kegiatans_id')
                ->references('id')
                ->on('kegiatans')
                ->onDelete('cascade');
            $table->integer('bulan')->length(2);
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('spks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matriks_honors_id');
            $table->foreign('matriks_honors_id')
                ->references('id')
                ->on('matriks_honors')
                ->onDelete('cascade');
            $table->string('no_spk')->length(10);
            $table->unsignedBigInteger('mitras_id');
            $table->foreign('mitras_id')
                ->references('id')
                ->on('mitras')
                ->onDelete('cascade');
        });

        Schema::create('spks_alokasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spks_id');
            $table->foreign('spks_id')
                ->references('id')
                ->on('spks')
                ->onDelete('cascade');
            $table->string('no_bast')->length(10);
            $table->integer('volume')->length(4);
            $table->string('satuan')->length(20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriks_honors');
        Schema::dropIfExists('spks');
        Schema::dropIfExists('spks_alokasi');
    }
};
