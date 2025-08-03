<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AktaStatistic;

class AktaStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inisialisasi statistik untuk berbagai jenis akta
        $jenisAkta = ['kelahiran', 'kematian', 'perkawinan', 'perceraian', 'kia'];
        
        foreach ($jenisAkta as $jenis) {
            AktaStatistic::create([
                'jenis_akta' => $jenis,
                'total_akta' => 0,
                'total_bulan_ini' => 0,
                'total_tahun_ini' => 0,
                'last_updated' => now(),
            ]);
        }
    }
} 