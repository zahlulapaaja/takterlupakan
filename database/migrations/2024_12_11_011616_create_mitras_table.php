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
            $table->string('jk')->nullable();
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
