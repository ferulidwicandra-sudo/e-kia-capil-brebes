<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKia;

class AdminDashboardController extends Controller
{
    public function index()
    {
        try {
            $pengajuans = PengajuanKia::orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $pengajuans = collect([]); // Empty collection if database error
        }
        return view('admin.dashboard', compact('pengajuans'));
    }

    public function laporanAktaKelahiran()
    {
        return view('admin.laporan_akta_kelahiran');
    }

    public function laporanAktaKematian()
    {
        return view('admin.laporan_akta_kematian');
    }

    public function sistemEAkta()
    {
        return view('admin.sistem_e_akta');
    }
}