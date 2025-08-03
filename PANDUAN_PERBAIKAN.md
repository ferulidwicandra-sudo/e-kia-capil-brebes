# Panduan Perbaikan Aplikasi E-KIA Capil Brebes

## Masalah yang Ditemukan
1. **File .env tidak ada** - menyebabkan error konfigurasi database
2. **Server Laravel tidak berjalan** - menyebabkan error connection refused
3. **Database tidak terkonfigurasi** - perlu setup database

## Langkah Perbaikan

### 1. Jalankan Script Perbaikan Otomatis
```bash
# Jalankan script perbaikan
php fix_application.php
```

### 2. Atau Gunakan Batch File (Windows)
```bash
# Double click file start_server.bat
# Atau jalankan dari command prompt
start_server.bat
```

### 3. Manual Setup (Jika Script Gagal)

#### A. Buat File .env
Copy isi dari `env_config.txt` ke file `.env` baru

#### B. Generate Application Key
```bash
php artisan key:generate
```

#### C. Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

#### D. Setup Database
1. Pastikan MySQL/MariaDB berjalan
2. Buat database: `ekia_capil_brebes`
3. Jalankan migrasi:
```bash
php artisan migrate
```

#### E. Jalankan Seeder (Opsional)
```bash
php artisan db:seed
```

#### F. Jalankan Server
```bash
php artisan serve
```

## Struktur Database

### Tabel yang Dibutuhkan:
1. `users` - Tabel pengguna
2. `pengajuan_kia` - Tabel pengajuan KIA
3. `akta_statistics` - Tabel statistik akta

### Migrasi yang Tersedia:
- `2014_10_12_000000_create_users_table.php`
- `2025_07_23_010302_create_pengajuan_kia_table.php`
- `2025_07_28_054339_create_akta_statistics_table.php`

## Fitur Aplikasi

### Public Pages:
- `/` - Halaman utama
- `/pengajuan-kia` - Form pengajuan KIA
- `/status-kia` - Cek status pengajuan
- `/pengajuan-online` - Pengajuan online

### Admin Pages:
- `/admin/login` - Login admin
- `/admin` - Dashboard admin
- `/admin/statistics` - Statistik akta
- `/admin/laporan-akta-kelahiran` - Laporan akta kelahiran
- `/admin/laporan-akta-kematian` - Laporan akta kematian

## Troubleshooting

### Error: "No connection could be made"
- Pastikan MySQL berjalan
- Periksa konfigurasi database di `.env`
- Pastikan database `ekia_capil_brebes` sudah dibuat

### Error: "APP_KEY not set"
- Jalankan: `php artisan key:generate`

### Error: "Class not found"
- Jalankan: `composer dump-autoload`

### Error: "Permission denied"
- Pastikan folder `storage` dan `bootstrap/cache` writable
- Jalankan: `chmod -R 755 storage bootstrap/cache`

## Konfigurasi Database Default
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ekia_capil_brebes
DB_USERNAME=root
DB_PASSWORD=
```

## Kontak Support
Jika masih mengalami masalah, periksa:
1. Log error di `storage/logs/laravel.log`
2. Pastikan PHP dan MySQL terinstall dengan benar
3. Periksa firewall dan antivirus 