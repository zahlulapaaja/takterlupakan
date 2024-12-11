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
        Schema::create('nofps', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('rincian');
            $table->date('tgl');
            $table->timestamps();
        });

        Schema::create('perjadin_fp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nofps_id');
            $table->foreignId('pegawais_id');
            $table->string('no');
            $table->string('rincian');
            $table->date('tgl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
