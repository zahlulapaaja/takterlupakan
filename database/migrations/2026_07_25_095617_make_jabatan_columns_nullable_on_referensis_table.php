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
        Schema::table('referensis', function (Blueprint $table) {
            $table->integer('kpa')->nullable()->change();
            $table->integer('ppk')->nullable()->change();
            $table->integer('ppk2')->nullable()->change();
            $table->integer('bend')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('referensis', function (Blueprint $table) {
            $table->integer('kpa')->nullable(false)->change();
            $table->integer('ppk')->nullable(false)->change();
            $table->integer('ppk2')->nullable(false)->change();
            $table->integer('bend')->nullable(false)->change();
        });
    }
};
