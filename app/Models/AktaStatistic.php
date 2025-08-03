<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaStatistic extends Model
{
    use HasFactory;

    protected $table = 'akta_statistics';
    
    protected $fillable = [
        'jenis_akta',
        'total_akta',
        'total_bulan_ini',
        'total_tahun_ini',
        'last_updated'
    ];

    protected $casts = [
        'last_updated' => 'date'
    ];

    /**
     * Update statistik untuk jenis akta tertentu
     */
    public static function updateStatistic($jenisAkta)
    {
        $statistic = self::where('jenis_akta', $jenisAkta)->first();
        
        if (!$statistic) {
            $statistic = self::create([
                'jenis_akta' => $jenisAkta,
                'total_akta' => 0,
                'total_bulan_ini' => 0,
                'total_tahun_ini' => 0,
                'last_updated' => now()
            ]);
        }

        $now = now();
        $isSameMonth = $statistic->last_updated->format('Y-m') === $now->format('Y-m');
        $isSameYear = $statistic->last_updated->format('Y') === $now->format('Y');

        $statistic->update([
            'total_akta' => $statistic->total_akta + 1,
            'total_bulan_ini' => $isSameMonth ? $statistic->total_bulan_ini + 1 : 1,
            'total_tahun_ini' => $isSameYear ? $statistic->total_tahun_ini + 1 : 1,
            'last_updated' => $now
        ]);

        return $statistic;
    }

    /**
     * Reset statistik bulanan (dijalankan setiap awal bulan)
     */
    public static function resetMonthlyStatistics()
    {
        self::query()->update(['total_bulan_ini' => 0]);
    }

    /**
     * Reset statistik tahunan (dijalankan setiap awal tahun)
     */
    public static function resetYearlyStatistics()
    {
        self::query()->update(['total_tahun_ini' => 0]);
    }

    /**
     * Dapatkan total semua jenis akta
     */
    public static function getTotalAllAkta()
    {
        return self::sum('total_akta');
    }

    /**
     * Dapatkan total bulan ini untuk semua jenis akta
     */
    public static function getTotalBulanIni()
    {
        return self::sum('total_bulan_ini');
    }

    /**
     * Dapatkan total tahun ini untuk semua jenis akta
     */
    public static function getTotalTahunIni()
    {
        return self::sum('total_tahun_ini');
    }
} 