<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKia; // Import Model PengajuanKia yang sudah kita buat
use Illuminate\Support\Facades\Storage; // Untuk upload file

class PengajuanKiaController extends Controller
{
    /**
     * Menampilkan formulir pengajuan KIA.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pengajuan_kia.online'); // Akan me-load view di resources/views/pengajuan_kia/online.blade.php
    }

    /**
     * Menampilkan form pengajuan KIA.
     *
     * @return \Illuminate\View\View
     */
    public function form()
    {
        return view('pengajuan_kia.form_pengajuan'); // Akan me-load view form pengajuan
    }

    /**
     * Memproses dan menyimpan data pengajuan KIA yang dikirim dari formulir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // --- 1. Validasi Data ---
        $validatedData = $request->validate([
            'nik_anak' => 'required|string|digits:16|unique:pengajuan_kia,nik_anak',
            'nama_lengkap_anak' => 'required|string|max:255',
            'tanggal_lahir_anak' => 'required|date',
            'nik_orang_tua' => 'required|string|digits:16',
            'dokumen_pendukung' => 'required|file|mimes:pdf,jpg,png|max:5000', // max 5MB
        ], [
            'nik_anak.required' => 'NIK Anak wajib diisi.',
            'nik_anak.digits' => 'NIK Anak harus 16 digit.',
            'nik_anak.unique' => 'NIK Anak ini sudah pernah diajukan.',
            'nama_lengkap_anak.required' => 'Nama Lengkap Anak wajib diisi.',
            'tanggal_lahir_anak.required' => 'Tanggal Lahir Anak wajib diisi.',
            'tanggal_lahir_anak.date' => 'Format Tanggal Lahir Anak tidak valid.',
            'nik_orang_tua.required' => 'NIK Orang Tua/Wali wajib diisi.',
            'nik_orang_tua.digits' => 'NIK Orang Tua/Wali harus 16 digit.',
            'dokumen_pendukung.required' => 'Dokumen Pendukung wajib diunggah.',
            'dokumen_pendukung.file' => 'Dokumen Pendukung harus berupa file.',
            'dokumen_pendukung.mimes' => 'Format dokumen harus PDF, JPG, atau PNG.',
            'dokumen_pendukung.max' => 'Ukuran dokumen maksimal 5MB.',
        ]);

        // --- 2. Upload Dokumen ---
        $filePath = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            // Buat nama file unik
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Simpan file ke direktori 'public/dokumen_kia'
            // Laravel akan menyimpan ini di storage/app/public/dokumen_kia
            // Anda perlu menjalankan 'php artisan storage:link' agar bisa diakses publik
            $filePath = $file->storeAs('public/dokumen_kia', $fileName);
            // Kita akan menyimpan path relatif ke database
            $filePath = str_replace('public/', '', $filePath); // Menghilangkan 'public/'
        }

        // --- 3. Simpan Data ke Database ---
        PengajuanKia::create([
            'nik_anak' => $validatedData['nik_anak'],
            'nama_lengkap_anak' => $validatedData['nama_lengkap_anak'],
            'tanggal_lahir_anak' => $validatedData['tanggal_lahir_anak'],
            'nik_orang_tua' => $validatedData['nik_orang_tua'],
            'file_dokumen_path' => $filePath, // Simpan path file yang diupload
            'status' => 'menunggu', // Status awal selalu 'menunggu'
            'catatan' => null,
        ]);

        // --- 4. Redirect dan Beri Pesan Sukses ---
        return redirect('/status-kia')->with('success', 'Pengajuan KIA berhasil dikirim! Silakan cek status pengajuan menggunakan NIK Anak.');
    }
}