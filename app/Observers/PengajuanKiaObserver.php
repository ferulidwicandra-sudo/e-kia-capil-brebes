<?php

namespace App\Observers;

use App\Models\PengajuanKia;
use App\Models\AktaStatistic;
use Illuminate\Support\Facades\Log;

class PengajuanKiaObserver
{
    /**
     * Handle the PengajuanKia "created" event.
     */
    public function created(PengajuanKia $pengajuanKia): void
    {
        try {
            // Log untuk debugging
            Log::info('PengajuanKiaObserver: Pengajuan KIA baru dibuat', [
                'nik_anak' => $pengajuanKia->nik_anak,
                'nama_anak' => $pengajuanKia->nama_lengkap_anak,
                'created_at' => $pengajuanKia->created_at
            ]);

            // Otomatis tambah statistik KIA ketika ada pengajuan baru
            $statistic = AktaStatistic::updateStatistic('kia');
            
            // Log hasil update statistik
            Log::info('PengajuanKiaObserver: Statistik KIA berhasil diupdate', [
                'jenis_akta' => 'kia',
                'total_akta' => $statistic->total_akta,
                'total_bulan_ini' => $statistic->total_bulan_ini,
                'total_tahun_ini' => $statistic->total_tahun_ini
            ]);

        } catch (\Exception $e) {
            Log::error('PengajuanKiaObserver: Error saat update statistik', [
                'error' => $e->getMessage(),
                'nik_anak' => $pengajuanKia->nik_anak ?? 'unknown'
            ]);
        }
    }

    /**
     * Handle the PengajuanKia "updated" event.
     */
    public function updated(PengajuanKia $pengajuanKia): void
    {
        // Jika status berubah menjadi 'diterima', tambah statistik
        if ($pengajuanKia->wasChanged('status') && $pengajuanKia->status === 'diterima') {
            Log::info('PengajuanKiaObserver: Status pengajuan KIA berubah menjadi diterima', [
                'nik_anak' => $pengajuanKia->nik_anak,
                'status_lama' => $pengajuanKia->getOriginal('status'),
                'status_baru' => $pengajuanKia->status
            ]);
        }
    }

    /**
     * Handle the PengajuanKia "deleted" event.
     */
    public function deleted(PengajuanKia $pengajuanKia): void
    {
        Log::info('PengajuanKiaObserver: Pengajuan KIA dihapus', [
            'nik_anak' => $pengajuanKia->nik_anak,
            'nama_anak' => $pengajuanKia->nama_lengkap_anak
        ]);
        
        // Jika pengajuan dihapus, kurangi statistik (opsional)
        // AktaStatistic::decreaseStatistic('kia');
    }
} 