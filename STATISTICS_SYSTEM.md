# Sistem Statistik Akta Otomatis

## 📊 Overview

Sistem ini secara otomatis menambah total akta ketika ada data baru yang ditambahkan ke sistem. Sistem ini dirancang untuk melacak statistik berbagai jenis akta (KIA, Kelahiran, Kematian, Perkawinan, Perceraian) dengan perhitungan otomatis.

## 🚀 Fitur Utama

### ✅ Otomatis Increment
- Total akta otomatis bertambah ketika ada pengajuan baru
- Tracking bulanan dan tahunan otomatis
- Reset otomatis setiap awal bulan/tahun

### 📈 Dashboard Statistik
- Visualisasi data statistik real-time
- Tabel detail per jenis akta
- Grafik dan chart interaktif
- Export data ke berbagai format

### 🔧 Manajemen Data
- Manual reset statistik bulanan/tahunan
- API untuk integrasi eksternal
- Backup dan restore data statistik

## 🏗️ Struktur Database

### Tabel: `akta_statistics`
```sql
CREATE TABLE akta_statistics (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    jenis_akta VARCHAR(255) NOT NULL,
    total_akta INT DEFAULT 0,
    total_bulan_ini INT DEFAULT 0,
    total_tahun_ini INT DEFAULT 0,
    last_updated DATE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

## 📁 File Structure

```
app/
├── Models/
│   └── AktaStatistic.php              # Model untuk statistik akta
├── Observers/
│   └── PengajuanKiaObserver.php       # Observer untuk auto-increment
├── Http/Controllers/
│   └── AktaStatisticController.php    # Controller untuk statistik
└── Providers/
    └── AppServiceProvider.php         # Registrasi observer

database/
├── migrations/
│   └── 2025_01_15_000000_create_akta_statistics_table.php
└── seeders/
    └── AktaStatisticSeeder.php        # Inisialisasi data statistik

resources/views/admin/
└── statistics.blade.php               # Dashboard statistik

routes/
└── web.php                           # Routes untuk statistik
```

## 🔄 Cara Kerja

### 1. Auto-Increment System
```php
// Ketika ada pengajuan KIA baru
PengajuanKia::create([...]);

// Observer otomatis menambah statistik
class PengajuanKiaObserver {
    public function created(PengajuanKia $pengajuanKia) {
        AktaStatistic::updateStatistic('kia');
    }
}
```

### 2. Statistik Tracking
- **Total Keseluruhan**: Selalu bertambah
- **Bulan Ini**: Reset setiap awal bulan
- **Tahun Ini**: Reset setiap awal tahun

### 3. Perhitungan Otomatis
```php
// Contoh perhitungan di model
public static function updateStatistic($jenisAkta) {
    $statistic = self::where('jenis_akta', $jenisAkta)->first();
    
    $now = now();
    $isSameMonth = $statistic->last_updated->format('Y-m') === $now->format('Y-m');
    $isSameYear = $statistic->last_updated->format('Y') === $now->format('Y');

    $statistic->update([
        'total_akta' => $statistic->total_akta + 1,
        'total_bulan_ini' => $isSameMonth ? $statistic->total_bulan_ini + 1 : 1,
        'total_tahun_ini' => $isSameYear ? $statistic->total_tahun_ini + 1 : 1,
        'last_updated' => $now
    ]);
}
```

## 🛠️ Setup & Installation

### 1. Jalankan Setup Script
```bash
php setup_statistics.php
```

### 2. Manual Setup (Alternatif)
```bash
# Migration
php artisan migrate --path=database/migrations/2025_01_15_000000_create_akta_statistics_table.php

# Seeder
php artisan db:seed --class=AktaStatisticSeeder

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 📊 API Endpoints

### GET `/api/statistics`
Mendapatkan data statistik dalam format JSON
```json
{
    "success": true,
    "data": {
        "statistics": [...],
        "summary": {
            "total_all_akta": 150,
            "total_bulan_ini": 25,
            "total_tahun_ini": 150
        }
    }
}
```

### POST `/admin/statistics/update`
Update statistik manual
```json
{
    "jenis_akta": "kelahiran"
}
```

### POST `/admin/statistics/reset-monthly`
Reset statistik bulanan

### POST `/admin/statistics/reset-yearly`
Reset statistik tahunan

## 🎯 Penggunaan

### 1. Dashboard Admin
- Akses: `/admin/statistics`
- Fitur: Visualisasi statistik, reset data, export

### 2. Auto-Increment
- Otomatis berjalan ketika ada pengajuan baru
- Tidak perlu intervensi manual

### 3. Monitoring
- Real-time tracking
- Notifikasi perubahan signifikan
- Log aktivitas statistik

## 🔧 Konfigurasi

### Menambah Jenis Akta Baru
1. Update seeder `AktaStatisticSeeder.php`
2. Tambahkan jenis akta ke array `$jenisAkta`
3. Jalankan seeder ulang

### Mengubah Logika Perhitungan
1. Edit method `updateStatistic()` di model `AktaStatistic`
2. Sesuaikan logika perhitungan bulanan/tahunan

### Menambah Observer Baru
1. Buat observer baru untuk jenis akta tertentu
2. Register di `AppServiceProvider.php`
3. Implementasi logika auto-increment

## 📈 Monitoring & Maintenance

### Daily Tasks
- Cek konsistensi data statistik
- Monitor performa sistem
- Backup data statistik

### Monthly Tasks
- Reset statistik bulanan (otomatis)
- Review tren data
- Optimasi database

### Yearly Tasks
- Reset statistik tahunan (otomatis)
- Archive data lama
- Update sistem statistik

## 🚨 Troubleshooting

### Statistik Tidak Bertambah
1. Cek observer terdaftar di `AppServiceProvider`
2. Verifikasi model `AktaStatistic` ada
3. Cek log error Laravel

### Data Tidak Konsisten
1. Jalankan `php artisan cache:clear`
2. Cek foreign key constraints
3. Verifikasi data di database

### Performance Issues
1. Optimasi query database
2. Implementasi caching
3. Monitor penggunaan memory

## 📞 Support

Untuk bantuan teknis atau pertanyaan tentang sistem statistik, silakan hubungi tim development.

---

**Versi**: 1.0.0  
**Update Terakhir**: January 2025  
**Status**: Production Ready ✅ 