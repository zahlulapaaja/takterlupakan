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
            $table->foreignId('poks_id'); // mending langsung ambil mak aja ??
            $table->string('no');
            $table->string('nama_kegiatan');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->date('tgl_spj');
            $table->foreignId('pjk')->constrained(
                table: 'pegawais',
                indexName: 'id'
            );
            $table->integer('tahun');
            $table->timestamps();
        });

        // Schema::create('pjks', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('mak');
        //     $table->string('tahun');
        //     $table->foreignId('pjk')->constrained(
        //         table: 'pegawais',
        //         indexName: 'id'
        //     );
        // });

        Schema::create('spjs_alokasi_beban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spjs_id');
            $table->foreignId('sks_petugas_id');
            $table->integer('beban');
            $table->string('melakukan');
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spjs');
        Schema::dropIfExists('spjs_alokasi_beban');
    }
};
