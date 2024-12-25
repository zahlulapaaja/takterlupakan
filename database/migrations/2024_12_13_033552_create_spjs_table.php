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
        Schema::create('spjs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatans_id');
            $table->date('tgl');
            $table->string('no_st')->nullable();
            $table->string('tgl_st')->nullable();
            $table->string('kode_akun');
            $table->integer('tahun');
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('spjs_honor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spjs_id');
            $table->string('status');
            $table->integer('mitra_id')->nullable();
            $table->integer('pegawai_id')->nullable();
            $table->integer('beban');
        });

        Schema::create('spjs_translok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spjs_id');
            $table->string('status');
            $table->integer('mitra_id')->nullable();
            $table->integer('pegawai_id')->nullable();
            $table->integer('byk_kunj');
            $table->string('melakukan');
            $table->string('lokasi');
            $table->integer('nominal');
            $table->string('tgl_kunj');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spjs');
        Schema::dropIfExists('spjs_honor');
        Schema::dropIfExists('spjs_translok');
    }
};
