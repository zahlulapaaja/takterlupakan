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
            $table->string('nip_lama')->nullable();
            $table->string('nip_baru');
            $table->string('avatar')->nullable();
            // $table->string('nik')->nullable();
            $table->string('golongan');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('email');
            $table->string('no_hp');
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
            $table->string('id_sobat');
            $table->string('email');
            $table->string('posisi');
            $table->string('alamat_detail')->nullable();
            $table->string('alamat_prov')->nullable();
            $table->string('alamat_kab')->nullable();
            $table->string('alamat_kec')->nullable();
            $table->string('alamat_desa')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jk');
            $table->string('agama')->nullable();
            $table->string('status')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('catatan')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('an_rek')->nullable();
            $table->integer('tahun');
            $table->timestamps();
        });

        Schema::create('referensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kpa');
            $table->string('nip_kpa');
            $table->string('nama_ppk');
            $table->string('nip_ppk');
            $table->string('nama_bend');
            $table->string('nip_bend');
            $table->string('no_dipa');
            $table->date('tgl_dipa');
            $table->string('no_sk_kpa');
            $table->date('tgl_sk_kpa');
            $table->string('jln')->nullable();
            $table->string('kab')->nullable();
            $table->integer('kodepos')->nullable();
            $table->string('tlp')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->integer('tahun');
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
    }
};
