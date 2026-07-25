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
        Schema::create('referensi_pejabats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained();
            $table->enum('jabatan', [
                'KPA',
                'PPK',
                'PPK2',
                'BEND'
            ]);

            $table->date('tgl_mulai');
            $table->date('tgl_selesai')->nullable();

            $table->string('no_sk')->nullable();
            $table->date('tgl_sk')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referensi_pejabats');
    }
};
