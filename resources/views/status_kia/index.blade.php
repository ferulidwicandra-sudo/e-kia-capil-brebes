@extends('layouts.app')

@section('title', 'Cek Status KIA')

@section('content')
<!-- Banner -->
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
    Cek Status Pengajuan KIA
            </div>

<!-- Main Content -->
<div style="max-width:900px; margin:32px auto 0 auto;">
    <div style="background:#f1f7ff; border:1.5px solid #3b82f6; border-radius:16px; padding:18px 24px; margin:32px 0 32px 0; color:#3b82f6; font-size:1.1rem; display:flex; align-items:center;">
        <span style="font-size:1.5em; margin-right:12px;">&#8505;</span>
        Masukkan NIK anak untuk melihat status pengajuan Kartu Identitas Anak (KIA) Anda.
                    </div>

    <div style="background:#fff; border-radius:18px; box-shadow:0 2px 12px #3b82f611; padding:32px 24px; text-align:left; border:1.5px solid #e5e7eb; margin-bottom:32px;">
                <form action="{{ route('status.check') }}" method="POST">
                    @csrf
            <div style="font-size:2rem; font-weight:700; margin-bottom:18px; display:flex; align-items:center; gap:12px;">
                <span style="font-size:1.2em;">&#128269;</span> Pencarian Status KIA
            </div>
            <div style="margin-bottom:18px; display:block;">
                <label for="nik_anak" style="font-weight:600; display:block; margin-bottom:8px;">Masukkan NIK Anak</label>
                <input type="text" class="form-control" id="nik_anak" name="nik_anak" value="{{ old('nik_anak', $nikAnak ?? '') }}" maxlength="16" placeholder="16 digit NIK anak" required style="width:100%; padding:14px; border-radius:12px; border:1.5px solid #e5e7eb; font-size:1.1rem;">
                    </div>
            <button type="submit" style="width:100%; background:#7ea6f7; color:#fff; font-weight:600; border-radius:12px; padding:14px 0; font-size:1.1rem; border:none;">&#128269; Cari Status</button>
                </form>
    </div>

    @isset($pengajuan)
        <div style="background:#fff; border-radius:18px; box-shadow:0 2px 12px #22c55e11; padding:32px 24px; text-align:left; border:1.5px solid #e5e7eb; margin-bottom:32px;">
            <div style="font-size:1.3rem; font-weight:700; margin-bottom:18px;">Hasil Pencarian untuk NIK: {{ $nikAnak }}</div>
                    @if ($pengajuan)
                <table style="width:100%; font-size:1.1rem;">
                    <tr><td style="font-weight:600;">Nama Anak</td><td>{{ $pengajuan->nama_lengkap_anak }}</td></tr>
                    <tr><td style="font-weight:600;">Tanggal Lahir</td><td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_lahir_anak)->format('d-m-Y') }}</td></tr>
                    <tr><td style="font-weight:600;">Tanggal Kirim</td><td>{{ \Carbon\Carbon::parse($pengajuan->created_at)->format('d-m-Y H:i:s') }}</td></tr>
                    <tr><td style="font-weight:600;">Status</td><td>
                                            @switch($pengajuan->status)
                            @case('menunggu')<span style="background:#e5e7eb; color:#222; border-radius:6px; padding:4px 12px;">Menunggu</span>@break
                            @case('diterima')<span style="background:#22c55e; color:#fff; border-radius:6px; padding:4px 12px;">Diterima</span>@break
                            @case('ditolak')<span style="background:#e74c3c; color:#fff; border-radius:6px; padding:4px 12px;">Ditolak</span>@break
                            @case('perlu revisi')<span style="background:#f1c40f; color:#222; border-radius:6px; padding:4px 12px;">Perlu Revisi</span>@break
                            @default <span style="background:#7ea6f7; color:#fff; border-radius:6px; padding:4px 12px;">{{ $pengajuan->status }}</span>
                                            @endswitch
                    </td></tr>
                    <tr><td style="font-weight:600;">Catatan</td><td>{{ $pengajuan->catatan ?? '-' }}</td></tr>
                            </table>
                    @else
                <div style="background:#fffbe6; color:#e67e22; border:1.5px solid #f1c40f; border-radius:10px; padding:18px 24px; margin-top:18px;">Data pengajuan dengan NIK Anak <b>{{ $nikAnak }}</b> tidak ditemukan.</div>
                    @endif
        </div>
    @endisset
    
    <div style="background:#fff; border-radius:18px; box-shadow:0 2px 12px #22c55e11; border:1.5px solid #e5e7eb; padding:24px 24px; text-align:left; margin-bottom:32px;">
        <div style="font-size:1.15rem; font-weight:700; margin-bottom:8px;">Butuh Bantuan?</div>
        <div style="color:#6b7280; font-size:1.05rem;">Jika Anda mengalami kesulitan atau memiliki pertanyaan, silakan hubungi kantor Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes.</div>
    </div>
</div>

<!-- Footer -->
<div style="background:#23262b; color:#fff; text-align:center; padding:32px 0 8px 0; margin-top:48px;">
    <div style="font-size:1.15rem; font-weight:500;">&copy; 2024 Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes</div>
    <div style="color:#bbb; font-size:1rem; margin-top:6px;">Sistem E-KIA untuk kemudahan pelayanan masyarakat</div>
</div>
@endsection