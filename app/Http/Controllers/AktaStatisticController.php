<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AktaStatistic;
use App\Models\PengajuanKia;

class AktaStatisticController extends Controller
{
    /**
     * Menampilkan dashboard statistik akta
     */
    public function index()
    {
        $statistics = AktaStatistic::all();
        $totalAllAkta = AktaStatistic::getTotalAllAkta();
        $totalBulanIni = AktaStatistic::getTotalBulanIni();
        $totalTahunIni = AktaStatistic::getTotalTahunIni();
        
        // Statistik KIA khusus
        $kiaStatistic = AktaStatistic::where('jenis_akta', 'kia')->first();
        $totalKia = $kiaStatistic ? $kiaStatistic->total_akta : 0;
        $kiaBulanIni = $kiaStatistic ? $kiaStatistic->total_bulan_ini : 0;
        $kiaTahunIni = $kiaStatistic ? $kiaStatistic->total_tahun_ini : 0;

        return view('admin.statistics', compact(
            'statistics',
            'totalAllAkta',
            'totalBulanIni', 
            'totalTahunIni',
            'totalKia',
            'kiaBulanIni',
            'kiaTahunIni'
        ));
    }

    /**
     * Menampilkan halaman sistem E-Akta
     */
    public function sistemEAkta()
    {
        // Ambil data statistik
        $totalKelahiran = AktaStatistic::where('jenis_akta', 'kelahiran')->first();
        $totalKematian = AktaStatistic::where('jenis_akta', 'kematian')->first();
        
        // Hitung total pengajuan (semua jenis akta)
        $totalPengajuan = AktaStatistic::getTotalAllAkta();
        
        // Data dummy untuk tabel (bisa diganti dengan data dari database)
        $dataPemohon = [
            [
                'id' => 1,
                'nama' => 'Ahmad Fadillah',
                'nik' => '3329121234567890',
                'jenis_akta' => 'kelahiran',
                'tanggal_pengajuan' => '2025-07-15',
                'status' => 'selesai'
            ],
            [
                'id' => 2,
                'nama' => 'Siti Nurhaliza',
                'nik' => '3329121234567891',
                'jenis_akta' => 'kelahiran',
                'tanggal_pengajuan' => '2025-07-22',
                'status' => 'selesai'
            ],
            [
                'id' => 3,
                'nama' => 'Haji Ahmad Suparman',
                'nik' => '3329121234567892',
                'jenis_akta' => 'kematian',
                'tanggal_pengajuan' => '2025-07-10',
                'status' => 'selesai'
            ],
            [
                'id' => 4,
                'nama' => 'Siti Aminah',
                'nik' => '3329121234567893',
                'jenis_akta' => 'kematian',
                'tanggal_pengajuan' => '2025-07-18',
                'status' => 'selesai'
            ]
        ];

        return view('admin.sistem_e_akta', compact(
            'totalKelahiran',
            'totalKematian',
            'totalPengajuan',
            'dataPemohon'
        ));
    }

    /**
     * Menambah data pemohon baru
     */
    public function tambahPemohon(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nik' => 'required|string|digits:16',
            'jenis_akta' => 'required|string|in:kelahiran,kematian,perkawinan,perceraian',
            'tanggal_pengajuan' => 'required|date',
            'status' => 'required|string|in:diterima,proses,selesai,ditolak',
            'keterangan' => 'nullable|string'
        ], [
            'nama_pemohon.required' => 'Nama pemohon wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus 16 digit.',
            'jenis_akta.required' => 'Jenis akta wajib dipilih.',
            'jenis_akta.in' => 'Jenis akta tidak valid.',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi.',
            'tanggal_pengajuan.date' => 'Format tanggal tidak valid.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.'
        ]);

        // Update statistik untuk jenis akta yang dipilih
        $statistic = AktaStatistic::updateStatistic($request->jenis_akta);

        // Simpan data pemohon (bisa disimpan ke database jika diperlukan)
        // Untuk sementara kita hanya update statistik
        
        return response()->json([
            'success' => true,
            'message' => 'Data pemohon berhasil ditambahkan dan total pengajuan telah diupdate!',
            'data' => [
                'nama_pemohon' => $request->nama_pemohon,
                'nik' => $request->nik,
                'jenis_akta' => $request->jenis_akta,
                'tanggal_pengajuan' => $request->tanggal_pengajuan,
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ],
            'statistics' => [
                'total_kelahiran' => AktaStatistic::where('jenis_akta', 'kelahiran')->first()->total_akta ?? 0,
                'total_kematian' => AktaStatistic::where('jenis_akta', 'kematian')->first()->total_akta ?? 0,
                'total_pengajuan' => AktaStatistic::getTotalAllAkta()
            ]
        ]);
    }

    /**
     * Update statistik manual (untuk testing)
     */
    public function updateStatistic(Request $request)
    {
        $request->validate([
            'jenis_akta' => 'required|string',
        ]);

        $statistic = AktaStatistic::updateStatistic($request->jenis_akta);

        return response()->json([
            'success' => true,
            'message' => 'Statistik berhasil diupdate',
            'data' => $statistic
        ]);
    }

    /**
     * Reset statistik bulanan
     */
    public function resetMonthly()
    {
        AktaStatistic::resetMonthlyStatistics();
        
        return response()->json([
            'success' => true,
            'message' => 'Statistik bulanan berhasil direset'
        ]);
    }

    /**
     * Reset statistik tahunan
     */
    public function resetYearly()
    {
        AktaStatistic::resetYearlyStatistics();
        
        return response()->json([
            'success' => true,
            'message' => 'Statistik tahunan berhasil direset'
        ]);
    }

    /**
     * API untuk mendapatkan statistik dalam format JSON
     */
    public function apiStatistics()
    {
        $statistics = AktaStatistic::all();
        $totalAllAkta = AktaStatistic::getTotalAllAkta();
        $totalBulanIni = AktaStatistic::getTotalBulanIni();
        $totalTahunIni = AktaStatistic::getTotalTahunIni();

        return response()->json([
            'success' => true,
            'data' => [
                'statistics' => $statistics,
                'summary' => [
                    'total_all_akta' => $totalAllAkta,
                    'total_bulan_ini' => $totalBulanIni,
                    'total_tahun_ini' => $totalTahunIni
                ]
            ]
        ]);
    }
} 