<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKia; // Import Model PengajuanKia

class StatusKiaController extends Controller
{
    /**
     * Menampilkan halaman cek status KIA.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('status_kia.index'); // Akan me-load view di resources/views/status_kia/index.blade.php
    }

    /**
     * Mencari dan menampilkan status pengajuan KIA berdasarkan NIK Anak.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function check(Request $request)
    {
        // --- 1. Validasi Input ---
        $request->validate([
            'nik_anak' => 'required|string|digits:16',
        ], [
            'nik_anak.required' => 'NIK Anak wajib diisi.',
            'nik_anak.digits' => 'NIK Anak harus 16 digit.',
        ]);

        $nikAnak = $request->input('nik_anak');

        // --- 2. Cari Pengajuan di Database ---
        $pengajuan = PengajuanKia::where('nik_anak', $nikAnak)->first();

        // --- 3. Kirim Data ke View ---
        // Kita kirimkan NIK yang dicari dan hasil pengajuan ke view
        return view('status_kia.index', [
            'nikAnak' => $nikAnak,
            'pengajuan' => $pengajuan, // Ini bisa null jika tidak ditemukan
        ]);
    }
}