# 📊 Sistem Statistik Akta Otomatis - Panduan Lengkap

## 🎯 Tujuan

Sistem ini dibuat untuk **otomatis menambah total akta** ketika ada data baru yang ditambahkan ke sistem. Setiap kali ada pengajuan KIA baru, statistik akan otomatis bertambah tanpa perlu intervensi manual.

## 🚀 Cara Setup

### Langkah 1: Jalankan Setup Script
```bash
php setup_statistics.php
```

### Langkah 2: Test Sistem
```bash
php test_statistics.php
```

### Langkah 3: Akses Dashboard
- Buka browser dan akses: `http://localhost/admin/statistics`
- Login dengan kredensial admin

## 🔄 Cara Kerja Sistem

### 1. Auto-Increment Otomatis
```php
// Ketika user submit pengajuan KIA baru
PengajuanKia::create([
    'nik_anak' => '1234567890123456',
    'nama_lengkap_anak' => 'Ahmad',
    // ... data lainnya
]);

// Observer otomatis menambah statistik
PengajuanKiaObserver::created($pengajuanKia) {
    AktaStatistic::updateStatistic('kia'); // Total otomatis +1
}
```

### 2. Tracking Bulanan & Tahunan
- **Total Keseluruhan**: Selalu bertambah
- **Bulan Ini**: Reset otomatis setiap awal bulan
- **Tahun Ini**: Reset otomatis setiap awal tahun

### 3. Perhitungan Real-time
```php
// Contoh perhitungan
$statistic = AktaStatistic::where('jenis_akta', 'kia')->first();

// Jika masih bulan yang sama
if ($isSameMonth) {
    $statistic->total_bulan_ini += 1;
} else {
    $statistic->total_bulan_ini = 1; // Reset ke 1
}

// Jika masih tahun yang sama
if ($isSameYear) {
    $statistic->total_tahun_ini += 1;
} else {
    $statistic->total_tahun_ini = 1; // Reset ke 1
}
```

## 📊 Fitur Dashboard

### 1. Statistik Umum
- Total Semua Akta
- Total Bulan Ini
- Total Tahun Ini
- Total KIA

### 2. Tabel Detail
- Jenis Akta (KIA, Kelahiran, Kematian, dll)
- Total Keseluruhan per jenis
- Total Bulan Ini per jenis
- Total Tahun Ini per jenis
- Tanggal Update Terakhir

### 3. Pengajuan KIA Terbaru
- Daftar 10 pengajuan KIA terbaru
- Status pengajuan (Menunggu, Diterima, Ditolak, Revisi)
- Informasi lengkap pengajuan

### 4. Tombol Aksi
- **Refresh Statistik**: Update data real-time
- **Reset Bulanan**: Reset semua total bulan ini ke 0
- **Reset Tahunan**: Reset semua total tahun ini ke 0
- **Dashboard Utama**: Kembali ke dashboard admin

## 🔧 API Endpoints

### 1. GET `/api/statistics`
Mendapatkan data statistik dalam format JSON
```bash
curl http://localhost/api/statistics
```

Response:
```json
{
    "success": true,
    "data": {
        "statistics": [
            {
                "id": 1,
                "jenis_akta": "kia",
                "total_akta": 25,
                "total_bulan_ini": 5,
                "total_tahun_ini": 25,
                "last_updated": "2025-01-15"
            }
        ],
        "summary": {
            "total_all_akta": 150,
            "total_bulan_ini": 25,
            "total_tahun_ini": 150
        }
    }
}
```

### 2. POST `/admin/statistics/update`
Update statistik manual
```bash
curl -X POST http://localhost/admin/statistics/update \
  -H "Content-Type: application/json" \
  -d '{"jenis_akta": "kelahiran"}'
```

### 3. POST `/admin/statistics/reset-monthly`
Reset statistik bulanan
```bash
curl -X POST http://localhost/admin/statistics/reset-monthly
```

### 4. POST `/admin/statistics/reset-yearly`
Reset statistik tahunan
```bash
curl -X POST http://localhost/admin/statistics/reset-yearly
```

## 📈 Cara Menambah Jenis Akta Baru

### 1. Update Seeder
Edit file `database/seeders/AktaStatisticSeeder.php`:
```php
$jenisAkta = ['kelahiran', 'kematian', 'perkawinan', 'perceraian', 'kia', 'akta_baru'];
```

### 2. Jalankan Seeder
```bash
php artisan db:seed --class=AktaStatisticSeeder
```

### 3. Buat Observer (Opsional)
Jika ingin auto-increment untuk jenis akta baru:
```php
// Buat observer baru
class AktaBaruObserver {
    public function created($aktaBaru) {
        AktaStatistic::updateStatistic('akta_baru');
    }
}

// Register di AppServiceProvider
AktaBaru::observe(AktaBaruObserver::class);
```

## 🛠️ Troubleshooting

### Problem: Statistik Tidak Bertambah
**Solusi:**
1. Cek observer terdaftar:
```bash
php test_statistics.php
```

2. Cek log error:
```bash
tail -f storage/logs/laravel.log
```

3. Clear cache:
```bash
php artisan cache:clear
php artisan config:clear
```

### Problem: Dashboard Tidak Muncul
**Solusi:**
1. Cek route terdaftar:
```bash
php artisan route:list | grep statistics
```

2. Cek view file ada:
```bash
ls resources/views/admin/statistics.blade.php
```

3. Clear view cache:
```bash
php artisan view:clear
```

### Problem: API Tidak Berfungsi
**Solusi:**
1. Cek CSRF token
2. Cek authentication middleware
3. Test dengan Postman atau curl

## 📋 Monitoring & Maintenance

### Daily Monitoring
- Cek dashboard statistik setiap hari
- Monitor pertumbuhan data
- Cek konsistensi data

### Monthly Tasks
- Review tren data bulanan
- Backup data statistik
- Optimasi database jika perlu

### Yearly Tasks
- Archive data lama
- Review performa sistem
- Update dokumentasi

## 🔐 Security

### Authentication
- Semua endpoint admin memerlukan login
- CSRF protection aktif
- Session management

### Data Protection
- Backup otomatis
- Logging aktivitas
- Audit trail

## 📞 Support

### Dokumentasi
- `STATISTICS_SYSTEM.md` - Dokumentasi teknis lengkap
- `README_STATISTICS.md` - Panduan pengguna

### Testing
- `test_statistics.php` - Script testing otomatis
- `setup_statistics.php` - Script setup otomatis

### Logs
- `storage/logs/laravel.log` - Log aplikasi
- Database logs untuk debugging

---

## 🎉 Selamat! Sistem Statistik Anda Siap Digunakan

Setelah setup selesai, sistem akan:
- ✅ Otomatis menambah total akta ketika ada data baru
- ✅ Tracking bulanan dan tahunan otomatis
- ✅ Dashboard visual yang informatif
- ✅ API untuk integrasi eksternal
- ✅ Reset manual untuk maintenance

**Akses Dashboard:** `http://localhost/admin/statistics`

**Status:** Production Ready ✅ 

## 🎉 Sistem Statistik Akta Otomatis Siap!

### ✅ Yang Telah Dibuat:

1. **Database & Model**
   - Tabel `akta_statistics` untuk menyimpan statistik
   - Model `AktaStatistic` dengan method otomatis
   - Seeder untuk inisialisasi data

2. **Observer System**
   - `PengajuanKiaObserver` untuk auto-increment
   - Otomatis menambah statistik ketika ada pengajuan baru
   - Tracking bulanan dan tahunan otomatis

3. **Controller & Routes**
   - `AktaStatisticController` untuk mengelola statistik
   - Routes untuk dashboard dan API
   - Endpoint untuk reset manual

4. **Dashboard Admin**
   - Halaman statistik visual yang informatif
   - Tabel detail per jenis akta
   - Tombol aksi untuk reset dan refresh

5. **API Endpoints**
   - `/api/statistics` - Mendapatkan data JSON
   - `/admin/statistics/update` - Update manual
   - `/admin/statistics/reset-monthly` - Reset bulanan
   - `/admin/statistics/reset-yearly` - Reset tahunan

### 🎉 Cara Setup:

1. **Jalankan setup script:**
   ```bash
   php setup_statistics.php
   ```

2. **Test sistem:**
   ```bash
   php test_statistics.php
   ```

3. **Akses dashboard:**
   - URL: `/admin/statistics`
   - Login dengan kredensial admin

### 🔄 Cara Kerja:

- **Otomatis**: Setiap ada pengajuan KIA baru → statistik otomatis +1
- **Real-time**: Dashboard menampilkan data terbaru
- **Tracking**: Bulanan dan tahunan otomatis reset
- **API**: Tersedia untuk integrasi eksternal

### 📊 Fitur Utama:

- ✅ Total akta otomatis bertambah
- ✅ Tracking bulanan & tahunan
- ✅ Dashboard visual informatif
- ✅ API untuk integrasi
- ✅ Reset manual untuk maintenance
- ✅ Logging dan monitoring

Sistem ini akan otomatis menambah total akta setiap kali ada pengajuan KIA baru, tanpa perlu intervensi manual. Semua data akan ter-track dengan baik dan dapat diakses melalui dashboard admin yang informatif.

Silakan jalankan `php setup_statistics.php` untuk mengaktifkan sistem ini! 