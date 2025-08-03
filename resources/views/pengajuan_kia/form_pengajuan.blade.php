@extends('layouts.guest')

@section('content')
<!-- Main Content Area - Blue Background -->
<div style="background:#3b82f6; min-height:100vh; padding:60px 40px; text-align:center;">
    <!-- Tombol Kembali dan Logout -->
    <div style="position:absolute; top:20px; right:40px; display:flex; gap:16px;">
        <!-- Tombol Kembali -->
        <button onclick="window.history.back()" style="background:#2563eb; color:#fff; border:none; border-radius:8px; padding:12px 20px; font-size:1rem; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; box-shadow:0 2px 8px rgba(0,0,0,0.2); transition:background 0.2s;" onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">
            <span style="font-size:1.2em;">&#8592;</span> Kembali
        </button>
        <!-- Tombol Logout -->
        <button onclick="window.location.href='/logout'" style="background:#e74c3c; color:#fff; border:none; border-radius:8px; padding:12px 20px; font-size:1rem; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; box-shadow:0 2px 8px rgba(0,0,0,0.2); transition:background 0.2s;" onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">
            <span style="font-size:1.2em;">&#124;</span> Logout
        </button>
    </div>
    
    <!-- Main Heading -->
    <h1 style="font-size:3rem; font-weight:700; margin:0 0 24px 0; color:#fff;">Form Pengajuan KIA</h1>
    
    <!-- Sub Heading -->
    <p style="font-size:1.5rem; color:#fff; margin:0 0 48px 0; opacity:0.9;">Lengkapi data anak Anda untuk pengajuan Kartu Identitas Anak</p>
    
    <!-- Form Container -->
    <div style="max-width:800px; margin:0 auto; background:#fff; border-radius:16px; padding:40px; box-shadow:0 8px 32px rgba(0,0,0,0.1);">
        <form action="{{ route('pengajuan-online.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- NIK Anak -->
            <div style="margin-bottom:24px;">
                <label for="nik_anak" style="font-weight:700; display:block; margin-bottom:8px; color:#333; font-size:1.1rem;">
                    <span style="margin-right:8px;">&#128100;</span> NIK Anak
                </label>
                <input type="text" id="nik_anak" name="nik_anak" value="{{ old('nik_anak') }}" maxlength="16" placeholder="Masukkan 16 digit NIK anak" required style="width:100%; padding:16px; border-radius:12px; border:2px solid #e5e7eb; font-size:1.1rem; transition:border-color 0.2s;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e5e7eb'">
                @error('nik_anak')
                    <div style="color:#e74c3c; font-size:0.9rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Nama Lengkap Anak -->
            <div style="margin-bottom:24px;">
                <label for="nama_lengkap_anak" style="font-weight:700; display:block; margin-bottom:8px; color:#333; font-size:1.1rem;">
                    <span style="margin-right:8px;">&#128100;</span> Nama Lengkap Anak
                </label>
                <input type="text" id="nama_lengkap_anak" name="nama_lengkap_anak" value="{{ old('nama_lengkap_anak') }}" placeholder="Masukkan nama lengkap anak" required style="width:100%; padding:16px; border-radius:12px; border:2px solid #e5e7eb; font-size:1.1rem; transition:border-color 0.2s;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e5e7eb'">
                @error('nama_lengkap_anak')
                    <div style="color:#e74c3c; font-size:0.9rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Tanggal Lahir Anak -->
            <div style="margin-bottom:24px;">
                <label for="tanggal_lahir_anak" style="font-weight:700; display:block; margin-bottom:8px; color:#333; font-size:1.1rem;">
                    <span style="margin-right:8px;">&#128197;</span> Tanggal Lahir Anak
                </label>
                <input type="date" id="tanggal_lahir_anak" name="tanggal_lahir_anak" value="{{ old('tanggal_lahir_anak') }}" required style="width:100%; padding:16px; border-radius:12px; border:2px solid #e5e7eb; font-size:1.1rem; transition:border-color 0.2s;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e5e7eb'">
                @error('tanggal_lahir_anak')
                    <div style="color:#e74c3c; font-size:0.9rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- NIK Orang Tua -->
            <div style="margin-bottom:32px;">
                <label for="nik_orang_tua" style="font-weight:700; display:block; margin-bottom:8px; color:#333; font-size:1.1rem;">
                    <span style="margin-right:8px;">&#128100;</span> NIK Orang Tua / Wali
                </label>
                <input type="text" id="nik_orang_tua" name="nik_orang_tua" value="{{ old('nik_orang_tua') }}" maxlength="16" placeholder="Masukkan 16 digit NIK orang tua/wali" required style="width:100%; padding:16px; border-radius:12px; border:2px solid #e5e7eb; font-size:1.1rem; transition:border-color 0.2s;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e5e7eb'">
                @error('nik_orang_tua')
                    <div style="color:#e74c3c; font-size:0.9rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Upload Dokumen -->
            <div style="margin-bottom:32px;">
                <label style="font-weight:700; display:block; margin-bottom:12px; color:#333; font-size:1.1rem;">
                    <span style="margin-right:8px;">&#128206;</span> Upload Dokumen Pendukung
                </label>
                <div style="border:2px dashed #d1d5db; border-radius:16px; padding:40px 20px; background:#f9fafb; cursor:pointer; transition:all 0.2s;" onclick="document.getElementById('dokumen_pendukung').click()" onmouseover="this.style.borderColor='#3b82f6'; this.style.background='#f0f9ff'" onmouseout="this.style.borderColor='#d1d5db'; this.style.background='#f9fafb'">
                    <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" accept=".pdf,.jpg,.jpeg,.png" style="display:none;" required>
                    <div style="text-align:center;">
                        <div style="font-size:3rem; margin-bottom:16px;">📁</div>
                        <div style="font-size:1.2rem; font-weight:600; color:#333; margin-bottom:8px;">Klik untuk upload dokumen</div>
                        <div style="color:#666; font-size:1rem;">Format: PDF, JPG, PNG (Max: 5MB)</div>
                        <div style="color:#999; font-size:0.9rem; margin-top:8px;">Gabungkan semua dokumen (KK, Akta Lahir, Foto 3x4, dll) dalam satu file</div>
                    </div>
                </div>
                @error('dokumen_pendukung')
                    <div style="color:#e74c3c; font-size:0.9rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <button type="submit" style="width:100%; background:#22c55e; color:#fff; font-weight:600; border-radius:12px; padding:18px 0; font-size:1.2rem; border:none; cursor:pointer; transition:all 0.3s;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                <span style="font-size:1.3em; margin-right:8px;">&#10003;</span> Kirim Pengajuan KIA
            </button>
        </form>
    </div>
</div>

<!-- Yellow Horizontal Divider -->
<div style="background:#fbbf24; height:8px; width:100%;"></div>

<!-- Footer Section - Blue Background -->
<div style="background:#3b82f6; padding:60px 40px; color:#fff;">
    <div style="max-width:1200px; margin:0 auto;">
        <div style="display:flex; justify-content:space-between; gap:40px; flex-wrap:wrap;">
            <!-- Column 1: E-KIA Capil Brebes -->
            <div style="flex:1; min-width:300px;">
                <h3 style="font-size:1.5rem; font-weight:700; margin:0 0 20px 0; color:#fff;">E-KIA Capil Brebes</h3>
                <p style="font-size:1.1rem; line-height:1.6; opacity:0.9;">Sistem pengajuan Kartu Identitas Anak secara online untuk memudahkan masyarakat Kabupaten Brebes.</p>
            </div>
            
            <!-- Column 2: Kontak Kami -->
            <div style="flex:1; min-width:300px;">
                <h3 style="font-size:1.5rem; font-weight:700; margin:0 0 20px 0; color:#fff;">Kontak Kami</h3>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div style="display:flex; align-items:center; gap:12px; font-size:1.1rem;">
                        <span style="font-size:1.3em;">&#128205;</span>
                        <span>Jl. Diponegoro No. 1, Brebes, Jawa Tengah</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; font-size:1.1rem;">
                        <span style="font-size:1.3em;">&#128222;</span>
                        <span>(0283) 671234</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; font-size:1.1rem;">
                        <span style="font-size:1.3em;">&#9993;</span>
                        <span>disdukcapil@brebeskab.go.id</span>
                    </div>
                </div>
            </div>
            
            <!-- Column 3: Jam Layanan -->
            <div style="flex:1; min-width:300px;">
                <h3 style="font-size:1.5rem; font-weight:700; margin:0 0 20px 0; color:#fff;">Jam Layanan</h3>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div style="display:flex; align-items:center; gap:12px; font-size:1.1rem;">
                        <span style="font-size:1.3em;">&#128337;</span>
                        <span>Senin - Jumat: 08:00 - 16:00</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; font-size:1.1rem;">
                        <span style="font-size:1.3em;">&#128337;</span>
                        <span>Sabtu - Minggu: Tutup</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div style="text-align:center; margin-top:60px; padding-top:40px; border-top:1px solid rgba(255,255,255,0.2);">
        <p style="font-size:1rem; opacity:0.8;">© 2024 Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes. Semua hak cipta dilindungi.</p>
    </div>
</div>
@endsection 