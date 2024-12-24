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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poks_id');
            $table->foreign('poks_id')
                ->references('id')
                ->on('poks')
                ->onDelete('cascade'); // bisa ga ya kalo ga cascade
            $table->string('nama_kegiatan');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->unsignedBigInteger('pjk');
            $table->foreign('pjk')
                ->references('id')
                ->on('pegawais')
                ->onDelete('cascade');
            $table->integer('tahun');
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
        Schema::dropIfExists('kegiatans');
    }
};