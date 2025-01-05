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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip_lama')->length(10)->nullable();
            $table->string('nip_baru')->length(18);
            $table->string('avatar')->nullable();
            $table->string('nik')->length(16)->nullable();
            $table->string('golongan')->length(10);
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('email');
            $table->string('no_hp')->length(30);
            $table->string('no_rek')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('an_rek')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('id_sobat')->length(30);
            $table->string('email');
            $table->string('posisi');
            $table->string('alamat_detail')->nullable();
            $table->string('alamat_prov')->nullable();
            $table->string('alamat_kab')->nullable();
            $table->string('alamat_kec')->nullable();
            $table->string('alamat_desa')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jk')->length(1);
            $table->string('agama')->length(1)->nullable();
            $table->string('status')->length(1)->nullable();
            $table->string('pendidikan')->length(1)->nullable();
            $table->string('pekerjaan')->length(2)->nullable();
            $table->string('no_telp')->length(30)->nullable();
            $table->string('npwp')->length(30)->nullable();
            $table->string('catatan')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('an_rek')->nullable();
            $table->integer('tahun')->length(4);
            $table->timestamps();
        });

        Schema::create('referensis', function (Blueprint $table) {
            $table->id();
            $table->integer('kpa')->length(3);
            $table->integer('ppk')->length(3);
            $table->integer('bend')->length(3);
            $table->string('no_dipa');
            $table->date('tgl_dipa');
            $table->string('no_sk_kpa');
            $table->date('tgl_sk_kpa');
            $table->integer('tahun')->length(4);
            $table->timestamps();
        });

        Schema::create('tims', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('singkatan')->length(30);
            $table->string('kode')->length(10);
            $table->unsignedBigInteger('ketua');
            $table->foreign('ketua')
                ->references('id')
                ->on('pegawais')
                ->onDelete('cascade');
            $table->integer('tahun')->length(4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
        Schema::dropIfExists('mitras');
        Schema::dropIfExists('referensis');
        Schema::dropIfExists('tims');
    }
};
