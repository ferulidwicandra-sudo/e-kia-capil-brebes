@extends('layouts.app')

@section('content')
<div style="margin:0; padding:0; width:100%;">
<style>
    body {
        overflow-x: hidden;
        max-width: 100vw;
        margin: 0;
        padding: 0;
        background: #f5f5f5;
    }
    * {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .container {
        margin: 0;
        padding: 0;
        width: 100%;
    }
    iframe {
        background: #f5f5f5 !important;
    }
    .white-bg {
        background: #f5f5f5 !important;
    }
</style>
<!-- Banner Utama dengan Foto Gedung -->
<div style="position:relative; width:100%; height:500px; overflow:hidden; margin-bottom:40px; user-select:none; pointer-events:none;">
    <!-- Background Image -->
    <img src="/6.jpg" alt="Gedung Dindukcapil Brebes" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
    
    <!-- Overlay untuk text -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3);"></div>
    
    <!-- Text Overlay 1 - SELAMAT DATANG -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); text-align:center; z-index:10;">
        <div style="background:#1e3a8a; color:#fff; padding:20px 40px; border-radius:8px; margin-bottom:16px; font-size:2.5rem; font-weight:700; letter-spacing:2px;">
            SELAMAT DATANG
        </div>
        <div style="background:#000; color:#fff; padding:16px 32px; border-radius:6px; font-size:1.3rem; font-weight:500;">
            Di Website Resmi Dindukcapil Kabupaten Brebes
        </div>
    </div>
    

</div>
<!-- Tulisan Berjalan di bawah Foto -->
<div style="background:#22c55e; color:#fff; padding:12px 40px; margin:0 0 20px 0;">
    <marquee style="font-size:1.1rem; font-weight:500;">
        🎉 Selamat Datang di Website Resmi Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes | 📞 Hubungi kami di (0283) 671 322 untuk bantuan | 📧 Email: dindukcapilbrebes3329@gmail.com | 🌐 Layanan Online 24/7 | 📋 KTP, KK, KIA, Akta Kelahiran, Akta Kematian | 🏢 Jl. Pangeran Diponegoro 150, Brebes 52212
    </marquee>
</div>
<!-- Logo dan Judul di bawah Banner -->
<div style="text-align:center; margin:0 0 40px 0;">
    <img src="/logok.png" alt="Logo Dindukcapil" style="height:120px; margin-bottom:20px; display:block; margin-left:auto; margin-right:auto;">
    <h1 style="font-size:3rem; font-weight:300; letter-spacing:2px; margin-bottom:10px;">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL<br>KABUPATEN BREBES</h1>
</div>

  
<div style="display:flex; justify-content:center; align-items:flex-start; gap:40px; max-width:1100px; margin:40px auto 0 auto; flex-wrap:wrap;">
    <!-- Sambutan -->
    <div style="flex:1; min-width:320px; max-width:480px; text-align:left;">
        <div style="font-size:1.1rem; font-weight:600; margin-bottom:10px;">
            <span style="font-size:1.2em;">&#128483;</span> <u>SAMBUTAN KEPALA DINAS</u>
        </div>
        <div style="font-size:1.3rem; color:#444; margin-bottom:30px;">
            Puji syukur kami panjatkan ke hadirat Allah SWT, karena atas berkat dan rahmatnya situs website Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes dapat ditampilkan....
        </div>
        <a href="#" style="display:inline-block; background:#00b050; color:#fff; padding:16px 36px; border-radius:2px; font-size:1.2rem; font-weight:500; text-decoration:none;">Lihat Selengkapnya</a>
    </div>
    <!-- Visi Misi -->
    <div style="flex:1; min-width:320px; max-width:480px; border-left:4px solid #e5e7eb; padding-left:32px;">
        <div style="font-size:1.1rem; font-weight:600; margin-bottom:10px;">VISI</div>
        <div style="font-size:1.2rem; font-style:italic; margin-bottom:18px;">"MENUJU BREBES UNGGUL, SEJAHTERA DAN BERKEADILAN"</div>
        <div style="font-size:1.1rem; font-weight:600; margin-bottom:10px;">MISI</div>
        <div style="font-size:1.2rem; color:#444;">
            Meningkatkan penyelenggaraan pemerintah daerah yang profesional, efektif dan efisien, serta menciptakan stabilitas keamanan dan ketertiban daerah
        </div>
    </div>
  </div>

 <div style="background:#b94a4a; color:#fff; display:flex; justify-content:center; align-items:stretch; gap:0; margin:60px 0 0 0; padding:40px 0; flex-wrap:wrap;">
    <!-- Kependudukan -->
    <div style="flex:1; min-width:320px; max-width:33%; display:flex; align-items:center; padding:0 32px;">
        <div style="margin-right:32px;">
            <!-- Ikon orang -->
            <svg width="70" height="70" fill="none" viewBox="0 0 70 70"><circle cx="22" cy="28" r="14" fill="#fff"/><circle cx="46" cy="22" r="10" fill="#fff"/><circle cx="32" cy="48" r="16" fill="#fff"/></svg>
        </div>
        <div>
            <div style="font-size:1.5rem; font-weight:500; margin-bottom:10px;">Kependudukan</div>
            <div style="font-size:1.1rem;">Melayani Kartu Tanda Penduduk (KTP), Kartu Keluarga (KK), Surat Keterangan Pindah (SKPWNI), Surat Keterangan Datang (SKDWNI), KIA (Kartu Identitas Anak).</div>
        </div>
    </div>
    <!-- Pencatatan Sipil -->
    <div style="flex:1; min-width:320px; max-width:33%; display:flex; align-items:center; padding:0 32px;">
        <div style="margin-right:32px;">
            <!-- Ikon dokumen -->
            <svg width="70" height="70" fill="none" viewBox="0 0 70 70"><rect x="12" y="14" width="46" height="42" rx="6" stroke="#fff" stroke-width="5"/><rect x="22" y="24" width="26" height="4" rx="2" fill="#fff"/><rect x="22" y="34" width="26" height="4" rx="2" fill="#fff"/><rect x="22" y="44" width="18" height="4" rx="2" fill="#fff"/></svg>
        </div>
        <div>
            <div style="font-size:1.5rem; font-weight:500; margin-bottom:10px;">Pencatatan Sipil</div>
            <div style="font-size:1.1rem;">Pencatatan Kelahiran, Pencatatan Kematian, Pencatatan Perkawinan, Pencatatan Perceraian, Perubahan Nama, Perubahan Kewarganegaraan.</div>
        </div>
    </div>
    <!-- Data Kependudukan -->
    <div style="flex:1; min-width:320px; max-width:33%; display:flex; align-items:center; padding:0 32px;">
        <div style="margin-right:32px;">
            <!-- Ikon grafik -->
            <svg width="70" height="70" fill="none" viewBox="0 0 70 70"><rect x="12" y="54" width="46" height="4" rx="2" fill="#fff"/><rect x="20" y="38" width="8" height="16" rx="2" fill="#fff"/><rect x="32" y="28" width="8" height="26" rx="2" fill="#fff"/><rect x="44" y="18" width="8" height="36" rx="2" fill="#fff"/></svg>
        </div>
        <div>
            <div style="font-size:1.5rem; font-weight:500; margin-bottom:10px;">Data Kependudukan</div>
            <div style="font-size:1.1rem;">Jumlah Penduduk, Jumlah Keluarga, dan data statistik kependudukan lainnya.</div>
        </div>
    </div>
</div>

<!-- Section grafik dan data agregat kependudukan di bawah -->
<div style="display:flex; justify-content:center; align-items:flex-start; gap:40px; max-width:1200px; margin:60px auto 0 auto; flex-wrap:wrap;">
    <!-- Grafik -->
            <div style="flex:2; min-width:340px; background:#f8f9fa; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:32px; margin-bottom:24px;">
        <div style="font-size:1.3rem; font-weight:500; margin-bottom:18px;">
            <span style="font-size:1.2em; vertical-align:middle;">&#128202;</span> GRAFIK JUMLAH PENDUDUK KABUPATEN BREBES SEMESTER 2 TAHUN 2024
        </div>
        <canvas id="chartPenduduk" height="220"></canvas>
    </div>
    <!-- Data Agregat -->
            <div style="flex:1; min-width:320px; background:#f8f9fa; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:32px; margin-bottom:24px;">
        <div style="font-size:1.3rem; font-weight:500; margin-bottom:18px;">
            <span style="font-size:1.2em; vertical-align:middle;">&#128200;</span> DATA AGREGAT KEPENDUDUKAN
        </div>
        <table style="width:100%; font-size:1.1rem;">
            <tr><td style="padding:10px 0;"><span style="font-size:1.2em; margin-right:8px;">&#128101;</span> Jumlah Penduduk</td><td style="width:10px;">:</td><td style="text-align:right;">2,066,426</td><td><button style="background:#00b050; border:none; border-radius:4px; padding:6px 10px;"><span style="color:#fff; font-size:1.1em;">&#128279;</span></button></td></tr>
            <tr><td style="padding:10px 0;"><span style="font-size:1.2em; margin-right:8px;">&#128100;</span> Jumlah Kepala Keluarga</td><td>:</td><td style="text-align:right;">698,120</td><td><button style="background:#00b050; border:none; border-radius:4px; padding:6px 10px;"><span style="color:#fff; font-size:1.1em;">&#128279;</span></button></td></tr>
            <tr><td style="padding:10px 0;"><span style="font-size:1.2em; margin-right:8px;">&#128196;</span> Jumlah Kepemilikan Kartu Keluarga</td><td>:</td><td style="text-align:right;">698,120</td><td><button style="background:#00b050; border:none; border-radius:4px; padding:6px 10px;"><span style="color:#fff; font-size:1.1em;">&#128279;</span></button></td></tr>
            <tr><td style="padding:10px 0;"><span style="font-size:1.2em; margin-right:8px;">&#128100;</span> Jumlah Wajib KTPel</td><td>:</td><td style="text-align:right;">1,510,743</td><td><button style="background:#00b050; border:none; border-radius:4px; padding:6px 10px;"><span style="color:#fff; font-size:1.1em;">&#128279;</span></button></td></tr>
            <tr><td style="padding:10px 0;"><span style="font-size:1.2em; margin-right:8px;">&#128179;</span> Jumlah Kepemilikan KTPel</td><td>:</td><td style="text-align:right;">0</td><td><button style="background:#00b050; border:none; border-radius:4px; padding:6px 10px;"><span style="color:#fff; font-size:1.1em;">&#128279;</span></button></td></tr>
        </table>
        <div style="font-size:0.95rem; color:#666; margin-top:18px;">* Sumber Data Agregat Semester 2 Tahun 2024</div>
    </div>
</div>



<!-- Section Lokasi Pelayanan KAMI (full layar, di atas galeri) -->
<div style="position:relative; left:50%; right:50%; margin-left:-50vw; margin-right:-50vw; width:100vw; background:#f5f5f5; padding:0 0 40px 0;">
    <h2 style="text-align:center; font-size:2rem; font-weight:400; letter-spacing:4px; margin-bottom:12px; padding-top:40px;">
        <span style="font-size:1.5em; vertical-align:middle;">&#128506;</span> LOKASI PELAYANAN KAMI
    </h2>
    <div style="text-align:center; font-size:1.15rem; font-weight:500; margin-bottom:24px;">
        <b>Kantor Kecamatan Sirampog</b><br>
        Sirampong, Manggis, Sirampog, Kabupaten Brebes, Jawa Tengah 52272
    </div>
    <div style="width:100vw; overflow-x:hidden;">
        <iframe
            width="100%"
            height="550"
            frameborder="0"
            style="border:0; border-radius:0; display:block; margin:0; background:#f5f5f5;"
            src="https://www.google.com/maps?q=-7.217222,109.036111&z=14&output=embed"
            allowfullscreen>
        </iframe>
    </div>
</div>

<!-- Section Galeri Kegiatan Kami -->
<div style="max-width:1400px; margin:60px auto 0 auto; background:#f5f5f5;">
    <h2 style="text-align:center; font-size:2rem; font-weight:400; letter-spacing:4px; margin-bottom:24px;">
        <span style="font-size:1.5em; vertical-align:middle;">&#128247;</span> GALERI KEGIATAN KAMI
        </h2>
    <div style="display:flex; justify-content:center; gap:32px; flex-wrap:wrap;">
        <!-- Galeri 1 -->
        <div style="flex:1; min-width:260px; max-width:320px; text-align:center;">
            <div style="background:#f8f9fa; border:1.5px solid #ddd; border-radius:6px; padding:8px; margin-bottom:16px;">
            <img src="/1.jpg" alt="Galeri 1" style="width:100%; height:220px; object-fit:cover; border-radius:4px; margin-bottom:20px;">
            </div>
            <div style="font-size:1.25rem; color:#444; font-weight:400;"> Pelayanan Administrasi di Acara Hari Anak Nasional 23 juli 2025</div>
        </div>
                <!-- Galeri 2 -->
        <div style="flex:1; min-width:260px; max-width:320px; text-align:center;">
            <div style="background:#f8f9fa; border:1.5px solid #ddd; border-radius:6px; padding:8px; margin-bottom:16px;">
            <img src="/2.jpg" alt="Galeri 2" style="width:100%; height:220px; object-fit:cover; border-radius:4px; margin-bottom:20px;">
            </div>
            <div style="font-size:1.25rem; color:#444; font-weight:400;">Lagu "Indonesia Raya" dinyanyikan setiap hari di berbagai instansi dan acara</div>
        </div>
        <!-- Galeri 3 -->
        <div style="flex:1; min-width:260px; max-width:320px; text-align:center;">
            <div style="background:#f8f9fa; border:1.5px solid #ddd; border-radius:6px; padding:8px; margin-bottom:16px;">
            <img src="/3.png" alt="Galeri 3" style="width:100%; height:220px; object-fit:cover; border-radius:4px; margin-bottom:20px;">
            </div>
            <div style="font-size:1.25rem; color:#444; font-weight:400;">Perekaman KIA, Dinas Dukcapil Brebes Jemput Bola ke Perpustakaan Umum</div>
        </div>
        <!-- Galeri 4 -->
        <div style="flex:1; min-width:260px; max-width:320px; text-align:center;">
            <div style="background:#f8f9fa; border:1.5px solid #ddd; border-radius:6px; padding:8px; margin-bottom:16px;">
            <img src="/4.png" alt="Galeri 4" style="width:100%; height:220px; object-fit:cover; border-radius:4px; margin-bottom:20px;">
            </div>
            <div style="font-size:1.25rem; color:#444; font-weight:400;">Gallery Foto Penilaian Kepatuhan Standar Pelayanan Publik Oleh Ombudsman RI </div>
        </div>
</div>

 <!-- Section Alamat Kantor dan Waktu Pelayanan (full layar) -->
 <div style="position:relative; left:50%; right:50%; margin-left:-50vw; margin-right:-50vw; width:100vw; display:flex; justify-content:center; align-items:flex-start; gap:0; background:#181818; flex-wrap:wrap; padding:40px 0;">
        <!-- Alamat Kantor -->
    <div style="flex:1; min-width:300px; padding:32px 0px 24px 0px; color:#fff;">
        <div style="margin-bottom:18px; padding-left:32px;">
            <span style="font-size:1.5em; vertical-align:middle; margin-right:8px;">&#127970;</span>
            <span style="font-size:1.15em; font-weight:600;">Alamat Kantor :</span>
            <div style="margin-top:10px; margin-left:0px;">
                Jln. Pangeran Diponegoro 150<br>
                Brebes 52212<br>
                <span style="text-decoration:underline;">Telp :</span> (0283) 671 322
            </div>
        </div>
        <div style="margin-bottom:18px; padding-left:32px;">
            <span style="font-size:1.3em; vertical-align:middle; margin-right:8px;">&#9993;</span>
            <span style="font-size:1.05em; font-weight:600;">Email :</span>
            <div style="margin-left:0px;">
                <a href="mailto:dindukcapilbrebes3329@gmail.com" style="color:#7ed6df; text-decoration:none;">dindukcapilbrebes3329@gmail.com</a>
            </div>
        </div>
        <div style="margin-bottom:0; padding-left:32px;">
            <span style="font-size:1.3em; vertical-align:middle; margin-right:8px;">&#128202;</span>
            <span style="font-size:1.5em; font-weight:600;">Statistik Pengunjung :</span>
        </div>
    </div>
    <!-- Facebook Kami -->
    <div style="flex:1; min-width:340px; max-width:500px; padding:32px 0px 24px 0px; color:#fff; display:flex; flex-direction:column; align-items:center;">
        <div style="font-size:1.5rem; font-weight:700; margin-bottom:18px; padding-left:32px; align-self:flex-start;">
            <span style="font-size:1.3em; vertical-align:middle; margin-right:8px;">&#xf09a;</span> Facebook Kami :
        </div>
        <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/capilbrebes&tabs=timeline&width=400&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="400" style="border:none;overflow:hidden;background:#181818; border-radius:8px;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        <div style="margin-top:12px; text-align:center; width:100%;">
            <a href="https://www.facebook.com/capilbrebes" target="_blank" rel="noopener" style="color:#7ed6df; text-decoration:underline; font-size:1.1rem;">Lihat Halaman Facebook Dindukcapil Brebes</a>
        </div>
    </div>
    <!-- Waktu Pelayanan -->
    <div style="flex:1; min-width:300px; padding:32px 0px 24px 0px; color:#fff;">
        <div style="font-size:1.5rem; font-weight:400; margin-bottom:18px; padding-left:32px;">Waktu Pelayanan</div>
        <div style="font-size:1.1rem; line-height:1.7; padding-left:32px;">
            Senin - Kamis : 08.00 - 16.00 WIB<br>
            Jumat : 08.00 - 11.00 WIB<br>
            Sabtu - Minggu : <span style="color:#e74c3c;">Tutup</span>
        </div>
    </div>
    <!-- Waktu Penyelesaian Layanan -->
    <div style="flex:1; min-width:300px; padding:32px 0px 24px 0px; color:#fff;">
        <div style="font-size:1.5rem; font-weight:400; margin-bottom:18px; padding-left:32px;">Waktu Penyelesaian Layanan :</div>
        <ul style="font-size:1.1rem; line-height:1.7; padding-left:48px; margin:0; color:#fff;">
            <li>Waktu penyelesaian layanan urus sendiri paling lama 4 hari.</li>
            <li>Dikuasakan pada orang lain paling lama 7 hari.</li>
        </ul>
        <div style="font-size:0.95rem; color:#ccc; margin-top:12px; padding-left:32px;">* syarat ketentuan berlaku :<br>1. Berkas lengkap dan benar<br>2. Tidak ada gangguan teknis</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
window.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('chartPenduduk').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Bantarkawung','Bumiayu','Paguyangan','Sirampog','Tonjong','Jatibarang','Wanasari','Brebes','Songgom','Kersana','Losari','Tanjung','Bulakamba','Larangan','Ketanggungan','Banjarharjo'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [34000, 52000, 54000, 55000, 37000, 41000, 47000, 90000, 42000, 32000, 31000, 74000, 54000, 98000, 77000, 60000],
                backgroundColor: [
                    '#555', '#a44', '#a44', '#a44', '#888', '#888', '#a44', '#f55', '#888', '#555', '#555', '#a44', '#888', '#f55', '#a44', '#888'
                ],
                borderRadius: 4,
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#555', font: { size: 14 }, callback: function(value) { return value.toLocaleString(); } }
                },
                x: {
                    ticks: { color: '#555', font: { size: 13 }, maxRotation: 45, minRotation: 45 }
                }
            }
        }
    });
});
</script>
@endsection
