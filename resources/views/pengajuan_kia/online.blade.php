@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div style="background:linear-gradient(90deg,#22c55e,#38d39f); color:#fff; font-size:2rem; font-weight:600; padding:32px 0 24px 40px; width:100%; margin:0 auto; position:relative;">
    <div style="position:absolute; top:20px; right:40px; display:flex; gap:16px;">
        <!-- Tombol Kembali -->
        <button onclick="window.history.back()" style="background:#3b82f6; color:#fff; border:none; border-radius:8px; padding:12px 20px; font-size:1rem; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; box-shadow:0 2px 8px rgba(0,0,0,0.2); transition:background 0.2s;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
            <span style="font-size:1.2em;">&#8592;</span> Kembali
        </button>
        <!-- Tombol Logout -->
        <button onclick="window.location.href='/logout'" style="background:#e74c3c; color:#fff; border:none; border-radius:8px; padding:12px 20px; font-size:1rem; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; box-shadow:0 2px 8px rgba(0,0,0,0.2); transition:background 0.2s;" onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">
            <span style="font-size:1.2em;">&#124;</span> Logout
        </button>
    </div>
    Selamat Datang di E-KIA Capil Brebes
</div>

<!-- Main Content Area -->
<div style="background:#fff; padding:60px 40px; text-align:center;">
    <!-- Large Icon -->
    <div style="display:inline-block; background:#22c55e; border-radius:50%; width:120px; height:120px; margin-bottom:32px;">
        <svg width="70" height="70" style="margin-top:25px;" fill="none" viewBox="0 0 24 24">
            <rect x="4" y="4" width="16" height="16" rx="2" fill="#fff"/>
            <rect x="8" y="8" width="8" height="2" rx="1" fill="#22c55e"/>
            <rect x="8" y="12" width="8" height="2" rx="1" fill="#22c55e"/>
        </svg>
    </div>
    
    <!-- Main Title -->
    <h1 style="font-size:2.5rem; font-weight:700; margin:0 0 24px 0; color:#333;">Sistem Pengajuan Kartu Identitas Anak Online</h1>
    
    <!-- Description -->
    <div style="font-size:1.25rem; color:#666; max-width:700px; margin:0 auto 60px auto; line-height:1.6;">
        Ajukan Kartu Identitas Anak (KIA) secara online dengan mudah dan cepat. Tidak perlu antre, cukup upload dokumen dan pantau statusnya dari rumah.
    </div>
    
    <!-- Feature Cards -->
    <div style="display:flex; justify-content:center; gap:32px; flex-wrap:wrap; max-width:1200px; margin:0 auto;">
        <!-- Card 1: Pengajuan Online -->
        <div style="background:#fff; border-radius:16px; padding:40px 32px; box-shadow:0 4px 20px rgba(0,0,0,0.1); flex:1; min-width:300px; max-width:350px; text-align:center;">
            <div style="background:#22c55e; border-radius:50%; width:80px; height:80px; margin:0 auto 24px auto; display:flex; align-items:center; justify-content:center;">
                <svg width="40" height="40" fill="none" viewBox="0 0 24 24">
                    <rect x="4" y="4" width="16" height="16" rx="2" fill="#fff"/>
                    <rect x="8" y="8" width="8" height="2" rx="1" fill="#22c55e"/>
                    <rect x="8" y="12" width="8" height="2" rx="1" fill="#22c55e"/>
                </svg>
            </div>
            <h3 style="font-size:1.5rem; font-weight:700; margin:0 0 16px 0; color:#333;">Pengajuan Online</h3>
            <p style="color:#666; font-size:1.1rem; margin:0 0 32px 0; line-height:1.5;">Ajukan KIA kapan saja, dimana saja melalui form online yang mudah digunakan</p>
            <a href="/pengajuan-kia/form" style="display:block; background:#22c55e; color:#fff; font-weight:600; border-radius:12px; padding:16px 0; font-size:1.2rem; text-decoration:none; transition:background 0.2s;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">Ajukan Sekarang</a>
        </div>
        
        <!-- Card 2: Cek Status -->
        <div style="background:#fff; border-radius:16px; padding:40px 32px; box-shadow:0 4px 20px rgba(0,0,0,0.1); flex:1; min-width:300px; max-width:350px; text-align:center;">
            <div style="background:#3b82f6; border-radius:50%; width:80px; height:80px; margin:0 auto 24px auto; display:flex; align-items:center; justify-content:center;">
                <svg width="40" height="40" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="2"/>
                    <polyline points="12,6 12,12 16,14" stroke="#fff" stroke-width="2" fill="none"/>
                </svg>
            </div>
            <h3 style="font-size:1.5rem; font-weight:700; margin:0 0 16px 0; color:#333;">Cek Status</h3>
            <p style="color:#666; font-size:1.1rem; margin:0 0 32px 0; line-height:1.5;">Pantau progres pengajuan KIA Anda secara real-time dengan NIK anak</p>
            <a href="/status-kia" style="display:block; background:#3b82f6; color:#fff; font-weight:600; border-radius:12px; padding:16px 0; font-size:1.2rem; text-decoration:none; transition:background 0.2s;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">Cek Status</a>
        </div>
        
        <!-- Card 3: Panel Admin -->
        <div style="background:#fff; border-radius:16px; padding:40px 32px; box-shadow:0 4px 20px rgba(0,0,0,0.1); flex:1; min-width:300px; max-width:350px; text-align:center;">
            <div style="background:#8b5cf6; border-radius:50%; width:80px; height:80px; margin:0 auto 24px auto; display:flex; align-items:center; justify-content:center;">
                <svg width="40" height="40" fill="none" viewBox="0 0 24 24">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="#fff" stroke-width="2" fill="none"/>
                    <path d="M9 12l2 2 4-4" stroke="#fff" stroke-width="2" fill="none"/>
                </svg>
            </div>
            <h3 style="font-size:1.5rem; font-weight:700; margin:0 0 16px 0; color:#333;">Panel Admin</h3>
            <p style="color:#666; font-size:1.1rem; margin:0 0 32px 0; line-height:1.5;">Kelola dan proses pengajuan KIA untuk petugas Dinas Kependudukan</p>
            <a href="/admin/login" style="display:block; background:#fff; color:#333; font-weight:600; border:2px solid #e5e7eb; border-radius:12px; padding:16px 0; font-size:1.2rem; text-decoration:none; transition:all 0.2s;" onmouseover="this.style.background='#f9fafb'; this.style.borderColor='#d1d5db'" onmouseout="this.style.background='#fff'; this.style.borderColor='#e5e7eb'">Login Admin</a>
        </div>
    </div>
    <!-- Cara Mengajukan KIA Section -->
    <div style="margin:80px 0 0 0;">
        <div style="font-size:2rem; font-weight:700; text-align:center; margin-bottom:48px; color:#333;">Cara Mengajukan KIA</div>
        <div style="display:flex; justify-content:center; gap:32px; flex-wrap:wrap;">
            <!-- Step 1: Siapkan Dokumen -->
            <div style="flex:1; min-width:250px; background:#fff; border-radius:18px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px 24px; text-align:center; border:1.5px solid #e5e7eb;">
                <div style="background:#22c55e; color:#fff; border-radius:50%; width:60px; height:60px; margin:0 auto 20px auto; display:flex; align-items:center; justify-content:center; font-size:1.8rem; font-weight:700;">1</div>
                <div style="font-size:1.3rem; font-weight:700; margin-bottom:12px; color:#333;">Siapkan Dokumen</div>
                <div style="color:#666; line-height:1.5;">Siapkan Kartu Keluarga, Akta Lahir, dan Foto 3x4 anak</div>
                    </div>

            <!-- Step 2: Isi Form Online -->
            <div style="flex:1; min-width:250px; background:#fff; border-radius:18px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px 24px; text-align:center; border:1.5px solid #e5e7eb;">
                <div style="background:#22c55e; color:#fff; border-radius:50%; width:60px; height:60px; margin:0 auto 20px auto; display:flex; align-items:center; justify-content:center; font-size:1.8rem; font-weight:700;">2</div>
                <div style="font-size:1.3rem; font-weight:700; margin-bottom:12px; color:#333;">Isi Form Online</div>
                <div style="color:#666; line-height:1.5;">Lengkapi data anak dan upload dokumen pendukung</div>
                    </div>

            <!-- Step 3: Pantau Status -->
            <div style="flex:1; min-width:250px; background:#fff; border-radius:18px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px 24px; text-align:center; border:1.5px solid #e5e7eb;">
                <div style="background:#22c55e; color:#fff; border-radius:50%; width:60px; height:60px; margin:0 auto 20px auto; display:flex; align-items:center; justify-content:center; font-size:1.8rem; font-weight:700;">3</div>
                <div style="font-size:1.3rem; font-weight:700; margin-bottom:12px; color:#333;">Pantau Status</div>
                <div style="color:#666; line-height:1.5;">Cek progres pengajuan menggunakan NIK anak</div>
                    </div>

            <!-- Step 4: Ambil KIA -->
            <div style="flex:1; min-width:250px; background:#fff; border-radius:18px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px 24px; text-align:center; border:1.5px solid #e5e7eb;">
                <div style="background:#22c55e; color:#fff; border-radius:50%; width:60px; height:60px; margin:0 auto 20px auto; display:flex; align-items:center; justify-content:center; font-size:1.8rem; font-weight:700;">4</div>
                <div style="font-size:1.3rem; font-weight:700; margin-bottom:12px; color:#333;">Ambil KIA</div>
                <div style="color:#666; line-height:1.5;">Datang ke kantor Disdukcapil untuk pengambilan</div>
            </div>
        </div>
                    </div>


<!-- Butuh Bantuan Section -->
    <div style="margin:60px 0 0 0;">
        <div style="background:#fff; border-radius:18px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:40px 32px; text-align:center; border:1.5px solid #e5e7eb;">
            <div style="font-size:1.8rem; font-weight:700; margin-bottom:16px; color:#333;">Butuh Bantuan?</div>
            <div style="color:#666; font-size:1.1rem; margin-bottom:32px;">Hubungi Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes</div>
            <div style="display:flex; justify-content:center; align-items:center; gap:40px; flex-wrap:wrap; font-size:1.1rem;">
                <div style="display:flex; align-items:center; gap:12px; color:#22c55e;">
                    <span style="font-size:1.4em;">&#128205;</span>
                    <span style="color:#333;">Jl. Diponegoro No. 1, Brebes</span>
                </div>
                <div style="display:flex; align-items:center; gap:12px; color:#22c55e;">
                    <span style="font-size:1.4em;">&#128222;</span>
                    <span style="color:#333;">(0283) 671234</span>
                </div>
                <div style="display:flex; align-items:center; gap:12px; color:#22c55e;">
                    <span style="font-size:1.4em;">&#9993;</span>
                    <span style="color:#333;">disdukcapil@brebes.go.id</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div style="background:#23262b; color:#fff; text-align:center; padding:32px 0 8px 0;">
    <div style="font-size:1.15rem; font-weight:500;">&copy; 2024 Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes</div>
    <div style="color:#bbb; font-size:1rem; margin-top:6px;">Sistem E-KIA untuk kemudahan pelayanan masyarakat</div>
</div>
@endsection 