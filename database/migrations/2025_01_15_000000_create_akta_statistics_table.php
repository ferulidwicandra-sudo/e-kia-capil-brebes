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
        Schema::create('akta_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_akta'); // kelahiran, kematian, perkawinan, perceraian, kia
            $table->integer('total_akta')->default(0);
            $table->integer('total_bulan_ini')->default(0);
            $table->integer('total_tahun_ini')->default(0);
            $table->date('last_updated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akta_statistics');
    }
}; 