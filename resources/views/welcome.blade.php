<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dindukcapil Kabupaten Brebes</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
        <style>
        body { font-family: 'Nunito', Arial, sans-serif; margin:0; background:#f4f7fa; }
        .header { background:#fff; border-bottom:1px solid #e5e7eb; padding:10px 0; display:flex; align-items:center; justify-content:space-between; }
        .header img { height:60px; margin-left:30px; }
        .header .contact { margin-right:30px; text-align:right; }
        .header .contact span { display:block; font-size:15px; color:#333; }
        .header .contact a { color:#333; text-decoration:none; font-size:15px; }
        .navbar { background:#22aaff; color:#fff; }
        .navbar ul { margin:0; padding:0 30px; display:flex; list-style:none; }
        .navbar li { position:relative; }
        .navbar > ul > li { margin-right:24px; }
        .navbar a { color:#fff; text-decoration:none; display:block; padding:16px 0; font-weight:600; font-size:16px; }
        .navbar a:hover { text-decoration:underline; }
        .banner { position:relative; width:100%; height:340px; background:url('https://brebeskab.go.id/assets/images/slider/slider1.jpg') center/cover no-repeat; display:flex; align-items:center; justify-content:center; }
        .banner .banner-content { text-align:center; }
        .banner h1 { background:#2196f3; color:#fff; display:inline-block; padding:12px 32px; font-size:2.5rem; font-weight:800; border-radius:4px; margin-bottom:12px; }
        .banner p { background:rgba(0,0,0,0.8); color:#fff; display:inline-block; padding:10px 28px; font-size:1.3rem; border-radius:4px; }
        @media (max-width:600px) {
            .header img { height:40px; margin-left:10px; }
            .header .contact { margin-right:10px; font-size:12px; }
            .navbar ul { flex-wrap:wrap; padding:0 10px; }
            .navbar > ul > li { margin-right:10px; }
            .banner { height:180px; }
            .banner h1 { font-size:1.2rem; padding:6px 12px; }
            .banner p { font-size:0.9rem; padding:6px 10px; }
            }
        </style>
    </head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="https://disdukcapil.brebeskab.go.id/assets/images/logo-brebes.png" alt="Logo Brebes">
        <div class="contact">
            <span><a href="mailto:dindukcapilbrebes3329@gmail.com">dindukcapilbrebes3329@gmail.com</a></span>
            <span>(0283) 671 322</span>
                                </div>
                            </div>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Pengumuman</a></li>
            <li><a href="#">Berita/Agenda</a></li>
            <li><a href="#">BLAKASUTA</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Unduh</a></li>
            <li><a href="#">Lokasi</a></li>
            <li><a href="#">PPID</a></li>
            <li><a href="#">Data Kependudukan</a></li>
            <li><a href="#">Pengaduan</a></li>
        </ul>
    </nav>
    <!-- Banner -->
    <div class="banner">
        <div class="banner-content">
            <h1>SELAMAT DATANG</h1>
            <p>Di Website Resmi Dindukcapil Kabupaten Brebes</p>
                                </div>
                            </div>
        <x-card-pengajuan-online />

<!-- Section Form Pengajuan -->
<div id="form-pengajuan" style="margin:64px auto 0 auto; max-width:600px;">
    <div style="background:linear-gradient(90deg,#22c55e,#38d39f); color:#fff; font-size:1.5rem; font-weight:600; padding:24px 0 16px 24px; border-radius:18px 18px 0 0; width:100%; margin-bottom:0;">Form Pengajuan KIA</div>
    <form action="#" method="POST" style="background:#fff; border-radius:0 0 18px 18px; box-shadow:0 2px 12px #22c55e11; padding:32px 24px; border:1.5px solid #e5e7eb;">
        <div style="margin-bottom:18px; display:block;">
            <label for="nik_anak" style="font-weight:600; display:block; margin-bottom:8px;">NIK Anak</label>
            <input type="text" id="nik_anak" name="nik_anak" maxlength="16" placeholder="Masukkan 16 digit NIK anak" required style="width:100%; padding:12px; border-radius:8px; border:1.5px solid #e5e7eb;">
                            </div>
        <div style="margin-bottom:18px; display:block;">
            <label for="nama_lengkap_anak" style="font-weight:600; display:block; margin-bottom:8px;">Nama Lengkap Anak</label>
            <input type="text" id="nama_lengkap_anak" name="nama_lengkap_anak" placeholder="Masukkan nama lengkap anak" required style="width:100%; padding:12px; border-radius:8px; border:1.5px solid #e5e7eb;">
                                </div>
        <div style="margin-bottom:18px; display:block;">
            <label for="tanggal_lahir_anak" style="font-weight:600; display:block; margin-bottom:8px;">Tanggal Lahir Anak</label>
            <input type="date" id="tanggal_lahir_anak" name="tanggal_lahir_anak" required style="width:100%; padding:12px; border-radius:8px; border:1.5px solid #e5e7eb;">
                            </div>
        <div style="margin-bottom:18px; display:block;">
            <label for="nik_orang_tua" style="font-weight:600; display:block; margin-bottom:8px;">NIK Orang Tua / Wali</label>
            <input type="text" id="nik_orang_tua" name="nik_orang_tua" maxlength="16" placeholder="Masukkan 16 digit NIK orang tua/wali" required style="width:100%; padding:12px; border-radius:8px; border:1.5px solid #e5e7eb;">
                        </div>
        <div style="margin-bottom:18px; display:block;">
            <label for="dokumen_pendukung" style="font-weight:600; display:block; margin-bottom:8px;">Upload Dokumen Pendukung</label>
            <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" accept=".pdf,.jpg,.png" required style="width:100%; padding:12px; border-radius:8px; border:1.5px solid #e5e7eb;">
                            </div>
        <button type="submit" style="width:100%; background:linear-gradient(90deg,#22c55e,#38d39f); color:#fff; font-weight:600; border-radius:10px; padding:14px 0; font-size:1.1rem; border:none; margin-top:18px;">Kirim Pengajuan KIA</button>
    </form>
        </div>
    </body>
</html>
