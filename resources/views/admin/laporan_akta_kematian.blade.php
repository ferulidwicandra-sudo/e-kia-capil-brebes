@extends('layouts.app')

@section('content')
<!-- Header Sistem E-Akta -->
<div style="background:#1e3a8a; color:#fff; padding:20px 40px; display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div style="display:flex; align-items:center;">
        <div style="background:#fff; border-radius:8px; padding:8px; margin-right:15px;">
            <svg width="24" height="24" fill="#1e3a8a" viewBox="0 0 24 24">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                <path d="M14 2v6h6"/>
                <path d="M16 13H8"/>
                <path d="M16 17H8"/>
                <path d="M10 9H8"/>
            </svg>
        </div>
        <div>
            <div style="font-size:1.8rem; font-weight:600;">Sistem E-Akta</div>
            <div style="font-size:1rem; opacity:0.9;">Dinas Dukcapil Kabupaten Brebes</div>
        </div>
    </div>
    <div style="display:flex; gap:12px;">
        <a href="/admin" style="background:#3b82f6; color:#fff; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; display:flex; align-items:center; font-size:1rem; text-decoration:none;">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                <path d="M19 12H5"/>
                <path d="m12 19-7-7 7-7"/>
            </svg>
            Kembali
        </a>
        <button onclick="logout()" style="background:#ef4444; color:#fff; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; display:flex; align-items:center; font-size:1rem;">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16,17 21,12 16,7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
            Logout
        </button>
    </div>
</div>

<!-- Judul Laporan -->
<div style="background:#fff; border-radius:12px; padding:24px; margin:0 40px 30px 40px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <div style="display:flex; align-items:center; margin-bottom:16px;">
        <div style="background:#dcfce7; border-radius:12px; padding:12px; margin-right:16px;">
            <svg width="32" height="32" fill="#16a34a" viewBox="0 0 24 24">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
        </div>
        <div>
            <h1 style="font-size:2rem; font-weight:600; color:#16a34a; margin:0;">Laporan Akta Kematian</h1>
            <div style="color:#666; margin-top:4px;">Data akta kematian yang telah diterbitkan</div>
        </div>
    </div>
</div>

<!-- Filter dan Pencarian -->
<div style="background:#fff; border-radius:12px; padding:24px; margin:0 40px 30px 40px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <div style="display:flex; gap:20px; align-items:end; margin-bottom:24px; flex-wrap:wrap;">
        <div style="flex:1; min-width:200px;">
            <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Pencarian</label>
            <input type="text" placeholder="Cari berdasarkan nama, NIK, atau nomor akta..." style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem;">
        </div>
        <div style="flex:1; min-width:200px;">
            <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Kecamatan</label>
            <select style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; background:#fff;">
                <option selected>Semua Kecamatan</option>
                <option>Bantarkawung</option>
                <option>Bumiayu</option>
                <option>Paguyangan</option>
                <option>Sirampog</option>
                <option>Tonjong</option>
                <option>Jatibarang</option>
                <option>Wanasari</option>
                <option>Brebes</option>
                <option>Songgom</option>
                <option>Kersana</option>
                <option>Losari</option>
                <option>Tanjung</option>
                <option>Bulakamba</option>
                <option>Larangan</option>
                <option>Ketanggungan</option>
                <option>Banjarharjo</option>
            </select>
        </div>
        <div style="flex:1; min-width:200px;">
            <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Periode</label>
            <select style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; background:#fff;">
                <option selected>Juli 2025</option>
                <option>Juni 2025</option>
                <option>Mei 2025</option>
                <option>April 2025</option>
            </select>
        </div>
        <button onclick="cariData()" style="background:#16a34a; color:#fff; border:none; padding:12px 24px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer; white-space:nowrap;">
            Cari Data
        </button>
    </div>
</div>

<!-- Tabel Data Akta Kematian -->
<div style="background:#fff; border-radius:12px; padding:24px; margin:0 40px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <h3 style="font-size:1.3rem; font-weight:600; color:#16a34a; margin:0;">Data Akta Kematian (2 Data)</h3>
        <div style="display:flex; gap:12px;">
            <button onclick="exportPDF()" style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:10px 16px; border-radius:6px; font-size:0.9rem; font-weight:500; cursor:pointer; display:flex; align-items:center;">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="margin-right:6px;">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                    <path d="M14 2v6h6"/>
                    <path d="M16 13H8"/>
                    <path d="M16 17H8"/>
                    <path d="M10 9H8"/>
                </svg>
                Export PDF
            </button>
            <button onclick="downloadExcel()" style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:10px 16px; border-radius:6px; font-size:0.9rem; font-weight:500; cursor:pointer; display:flex; align-items:center;">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="margin-right:6px;">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7,10 12,15 17,10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Excel
            </button>
        </div>
    </div>

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:0.95rem;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">No</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Nama Almarhum</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">NIK</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Tempat Meninggal</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Tanggal Meninggal</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Penyebab</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Kecamatan</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Status</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom:1px solid #e2e8f0;">
                    <td style="padding:12px;">1</td>
                    <td style="padding:12px; font-weight:500;">Haji Ahmad Suparman</td>
                    <td style="padding:12px;">3329121234567892</td>
                    <td style="padding:12px;">Brebes</td>
                    <td style="padding:12px;">10/07/2025</td>
                    <td style="padding:12px;">Sakit Tua</td>
                    <td style="padding:12px;">Brebes</td>
                    <td style="padding:12px;"><span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:4px; font-size:0.85rem;">Selesai</span></td>
                    <td style="padding:12px;">
                        <button onclick="lihatDetail(1)" style="background:#16a34a; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-size:0.85rem; cursor:pointer;">Detail</button>
                    </td>
                </tr>
                <tr style="border-bottom:1px solid #e2e8f0;">
                    <td style="padding:12px;">2</td>
                    <td style="padding:12px; font-weight:500;">Siti Aminah</td>
                    <td style="padding:12px;">3329121234567893</td>
                    <td style="padding:12px;">Wanasari</td>
                    <td style="padding:12px;">18/07/2025</td>
                    <td style="padding:12px;">Penyakit Jantung</td>
                    <td style="padding:12px;">Wanasari</td>
                    <td style="padding:12px;"><span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:4px; font-size:0.85rem;">Selesai</span></td>
                    <td style="padding:12px;">
                        <button onclick="lihatDetail(2)" style="background:#16a34a; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-size:0.85rem; cursor:pointer;">Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="display:flex; justify-content:center; align-items:center; margin-top:24px; gap:8px;">
        <button style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:8px 12px; border-radius:4px; cursor:pointer;">Previous</button>
        <button style="background:#16a34a; color:#fff; border:1px solid #16a34a; padding:8px 12px; border-radius:4px; cursor:pointer;">1</button>
        <button style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:8px 12px; border-radius:4px; cursor:pointer;">Next</button>
    </div>
</div>

<script>
function logout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        window.location.href = '/logout';
    }
}

function cariData() {
    alert('Fitur pencarian akan diimplementasikan');
}

function lihatDetail(id) {
    alert('Detail data dengan ID: ' + id + ' akan ditampilkan');
}

function exportPDF() {
    alert('Fitur export PDF akan diimplementasikan');
}

function downloadExcel() {
    alert('Fitur download Excel akan diimplementasikan');
}
</script>
@endsection 