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
        Schema::create('kaks', function (Blueprint $table) {
            $table->id();
            // perlu jenis ga ya ?
            $table->string('jenis'); // bikin jenis di constants aja yaa
            $table->string('judul');
            $table->longText('latar_belakang');
            $table->longText('tujuan');
            $table->longText('target');
            $table->longText('metode')->nullable();
            $table->date('tgl_awal');
            $table->date('tgl_akhir')->nullable();
            $table->string('tempat');
            $table->date('tgl'); // tanggal disahkan
            $table->longText('lampiran')->nullable();
            $table->string('file_lampiran')->nullable();
            $table->integer('tim');
            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('kaks_poks', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('poks_id');
            $table->foreign('poks_id')
                ->references('id')
                ->on('poks')
                ->onDelete('cascade');
        });

        Schema::create('kaks_perjadin', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('pegawais_id');
            $table->foreign('pegawais_id')
                ->references('id')
                ->on('pegawais')
                ->onDelete('cascade');
        });

        Schema::create('kaks_spesifikasi', function (Blueprint $table) {
            $table->unsignedBigInteger('kaks_id');
            $table->foreign('kaks_id')
                ->references('id')
                ->on('kaks')
                ->onDelete('cascade');
            $table->integer('rincian');
            $table->integer('volume');
            $table->string('satuan')->length(20);
            $table->string('spesifikasi');
        });


        // dasar hukum kak apakah semuanya sama ?
        // dasar hukum masukin constants kali yaa 
        // eh iya, untuk matriks honor belom ada warning klo mencapai limit (selip ttg yg lain satu wkwk)


        // pertanyaan ke forum :
        // - format kayak mana yang akan dipake ?
        // - apakah tujuan harus dalam bentuk poin-poin ?
        // - apakah kalo beda jenis (misal perjadin dan pengadaan), ada bab yang perlu dihilangkan

        // saran nama sistem :
        // - sianida, sidang, sidomukti, sidratulmuntaha, sigaret, sigma, silinder, siluman, simalakama, sinergi, 
        // sipongang, siratalmustakim, siuman, 

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaks');
        Schema::dropIfExists('kaks_poks');
        Schema::dropIfExists('kaks_perjadin');
        Schema::dropIfExists('kaks_spesifikasi');
    }
};
