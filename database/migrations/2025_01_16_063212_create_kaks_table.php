<?php

use App\Models\Kegiatan\Kegiatan;
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
            // $table->foreignId('kegiatans_id');
            // perlu jenis ga ya ?
            $table->string('jenis');

            $table->string('latar_belakang');
            $table->string('tujuan');
            $table->string('manfaat');
            $table->string('manfaat');
            $table->string('metode');
            // apakah ini dari kegiatan ?
            $table->date('tgl_awal');
            $table->date('tgl_akhir');

            $table->string('spesifikasi');
            $table->date('tgl'); // tanggal disahkan





            $table->integer('tahun')->length(4);
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });


        // bikin tabel peserta (mgkn perjadin bisa jadi banyak orang)
        // klo umum kan bisa jadi penanggung jawab kepala -> di kegiatan bisa ga klo pjk ada pilihan kepala
        // dasar hukum kak apakah semuanya sama ?
        // kalo satu kak lebih dari satu akun gimana ? apakah bisa dengan bikin tabel baru, 1 kak banyak kegiatan
        // dasar hukum masukin constants kali yaa 
        // eh iya, untuk matriks honor belom ada warning klo mencapai limit (selip ttg yg lain satu wkwk)


        // pertanyaan ke forum :
        // - format kayak mana yang akan dipake ?
        // - apakah tujuan harus dalam bentuk poin-poin ?
        // - apakah kalo beda jenis (misal perjadin dan pengadaan), ada bab yang perlu dihilangkan
        // - apakah setiap kak itu cuma satu akun saja 

        // solusi 
        // bikin tabel one to many (kak-pok)
        // bikin kak bukan di menu kegiatan, tapi di pok, di baris komponen ada tombol bikin kak
        // ketika bikin nanti ada checklist untuk menentukan detil dan akun mana aja yang bakal dipake 


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
    }
};
