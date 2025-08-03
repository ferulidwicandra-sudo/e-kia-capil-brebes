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
        Schema::create('pengajuan_kia', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('nik_anak', 16)->unique(); // NIK Anak (16 digit, unik)
            $table->string('nama_lengkap_anak'); // Nama Lengkap Anak
            $table->date('tanggal_lahir_anak'); // Tanggal Lahir Anak
            $table->string('nik_orang_tua', 16); // NIK Orang Tua/Wali (16 digit)
            $table->string('file_dokumen_path'); // Path/nama file dokumen yang diupload
            $table->enum('status', ['menunggu', 'diterima', 'ditolak', 'perlu revisi'])->default('menunggu'); // Status pengajuan
            $table->text('catatan')->nullable(); // Catatan dari admin
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kia');
    }
};