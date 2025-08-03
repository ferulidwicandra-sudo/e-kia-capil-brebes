# Panduan Menggunakan Laragon untuk E-KIA Capil Brebes

## Persiapan Laragon

### 1. Pastikan Laragon Berjalan
- Buka Laragon
- Pastikan Apache dan MySQL sudah running (hijau)
- Jika belum, klik tombol "Start All"

### 2. Konfigurasi Database
1. Buka HeidiSQL dari Laragon
2. Buat database baru dengan nama: `ekia_capil_brebes`
3. Atau gunakan phpMyAdmin di: http://localhost/phpmyadmin

### 3. Setup Aplikasi

#### A. Buat File .env
Copy isi dari `env_config.txt` ke file `.env` baru di root project

#### B. Generate Application Key
Buka terminal di Laragon (klik kanan pada Laragon → Terminal)
```bash
cd C:\laragon\www\e-kia-capil-brebes
php artisan key:generate
```

#### C. Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

#### D. Jalankan Migrasi
```bash
php artisan migrate
```

#### E. Jalankan Seeder (Opsional)
```bash
php artisan db:seed
```

### 4. Akses Aplikasi

#### Menggunakan Laragon Auto Virtual Host
- Laragon akan otomatis membuat virtual host
- Akses: http://e-kia-capil-brebes.test
- Atau: http://localhost/e-kia-capil-brebes

#### Menggunakan Laragon Server
- Klik kanan pada folder project di Laragon
- Pilih "www"
- Akses: http://localhost/e-kia-capil-brebes

### 5. Konfigurasi .env untuk Laragon

```env
APP_NAME="E-KIA Capil Brebes"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://e-kia-capil-brebes.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ekia_capil_brebes
DB_USERNAME=root
DB_PASSWORD=
```

## Troubleshooting Laragon

### Error: "Database connection failed"
1. Pastikan MySQL running di Laragon
2. Periksa database `ekia_capil_brebes` sudah dibuat
3. Periksa username/password di `.env`

### Error: "APP_KEY not set"
```bash
php artisan key:generate
```

### Error: "Permission denied"
- Pastikan folder `storage` dan `bootstrap/cache` writable
- Di Windows, biasanya tidak ada masalah permission

### Error: "Virtual host not working"
1. Restart Laragon
2. Periksa file hosts: `C:\Windows\System32\drivers\etc\hosts`
3. Pastikan ada entry: `127.0.0.1 e-kia-capil-brebes.test`

## Fitur Laragon yang Berguna

### 1. Auto Virtual Host
- Laragon otomatis membuat virtual host untuk setiap folder di `www`
- Format: `folder-name.test`

### 2. Database Management
- HeidiSQL untuk MySQL
- phpMyAdmin di http://localhost/phpmyadmin

### 3. Terminal Terintegrasi
- Klik kanan pada Laragon → Terminal
- Terminal akan langsung di folder project

### 4. Quick Access
- Klik kanan pada folder project → www
- Langsung buka di browser

## Langkah Cepat Setup

1. **Start Laragon** - Pastikan Apache & MySQL running
2. **Buat Database** - `ekia_capil_brebes` di HeidiSQL
3. **Copy .env** - Dari `env_config.txt` ke `.env`
4. **Generate Key** - `php artisan key:generate`
5. **Migrate** - `php artisan migrate`
6. **Akses** - http://e-kia-capil-brebes.test

## Struktur URL Laragon

### Development URLs:
- **Virtual Host**: http://e-kia-capil-brebes.test
- **Local Path**: http://localhost/e-kia-capil-brebes
- **Admin Login**: http://e-kia-capil-brebes.test/admin/login
- **Public Form**: http://e-kia-capil-brebes.test/pengajuan-kia

### Database:
- **HeidiSQL**: Dari menu Laragon
- **phpMyAdmin**: http://localhost/phpmyadmin
- **Database**: ekia_capil_brebes 