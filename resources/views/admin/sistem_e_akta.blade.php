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

<!-- Kartu Statistik -->
<div style="display:flex; gap:20px; margin-bottom:30px; padding:0 40px;">
    <!-- Total Akta Kelahiran -->
    <div onclick="filterByType('kelahiran')" style="flex:1; background:#fff; border-radius:12px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.1); display:flex; align-items:center; justify-content:space-between; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
        <div>
            <div style="font-size:1.1rem; color:#666; margin-bottom:8px;">Total Akta Kelahiran</div>
            <div id="totalKelahiran" style="font-size:2.5rem; font-weight:600; color:#1e3a8a;">{{ $totalKelahiran->total_akta ?? 0 }}</div>
        </div>
        <div style="background:#e0e7ff; border-radius:12px; padding:12px;">
            <svg width="32" height="32" fill="#1e3a8a" viewBox="0 0 24 24">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="m22 21-2-2"/>
                <path d="M16 16l4 4 4-4"/>
            </svg>
        </div>
    </div>

    <!-- Total Akta Kematian -->
    <div onclick="filterByType('kematian')" style="flex:1; background:#fff; border-radius:12px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.1); display:flex; align-items:center; justify-content:space-between; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
        <div style="background:#dcfce7; border-radius:12px; padding:12px;">
            <svg width="32" height="32" fill="#16a34a" viewBox="0 0 24 24">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
        </div>
        <div style="text-align:right;">
            <div style="font-size:1.1rem; color:#666; margin-bottom:8px;">Total Akta Kematian</div>
            <div id="totalKematian" style="font-size:2.5rem; font-weight:600; color:#16a34a;">{{ $totalKematian->total_akta ?? 0 }}</div>
        </div>
    </div>

    <!-- Total Pengajuan -->
    <div style="flex:1; background:#fff; border-radius:12px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.1); display:flex; align-items:center; justify-content:space-between;">
        <div>
            <div style="font-size:1.1rem; color:#666; margin-bottom:8px;">Total Pengajuan</div>
            <div id="totalPengajuan" style="font-size:2.5rem; font-weight:600; color:#16a34a;">{{ $totalPengajuan }}</div>
        </div>
        <div style="background:#dcfce7; border-radius:12px; padding:12px;">
            <svg width="32" height="32" fill="#16a34a" viewBox="0 0 24 24">
                <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"/>
            </svg>
        </div>
    </div>
</div>

<!-- Filter Data Laporan -->
<div style="background:#fff; border-radius:12px; padding:32px; margin:0 40px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <div style="display:flex; align-items:center; margin-bottom:20px;">
        <svg width="24" height="24" fill="#1e3a8a" viewBox="0 0 24 24" style="margin-right:12px;">
            <circle cx="11" cy="11" r="8"/>
            <path d="m21 21-4.35-4.35"/>
        </svg>
        <h2 style="font-size:1.5rem; font-weight:600; color:#1e3a8a; margin:0;">Filter Data Laporan</h2>
    </div>
    
    <div style="color:#666; margin-bottom:24px;">Gunakan filter untuk menampilkan data sesuai kriteria</div>
    
    <div style="display:flex; gap:20px; align-items:end; margin-bottom:32px; flex-wrap:wrap;">
        <!-- Jenis Akta -->
        <div style="flex:1; min-width:200px;">
            <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Jenis Akta</label>
            <select id="jenisAkta" onchange="filterData()" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; background:#fff;">
                <option value="semua" selected>Semua</option>
                <option value="kelahiran">Akta Kelahiran</option>
                <option value="kematian">Akta Kematian</option>
                <option value="perkawinan">Akta Perkawinan</option>
                <option value="perceraian">Akta Perceraian</option>
            </select>
        </div>
        
        <!-- Bulan & Tahun -->
        <div style="flex:1; min-width:200px;">
            <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Bulan & Tahun</label>
            <select id="periode" onchange="filterData()" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; background:#fff;">
                <option selected>Juli 2025</option>
                <option>Juni 2025</option>
                <option>Mei 2025</option>
                <option>April 2025</option>
            </select>
        </div>
        
        <!-- Tampilkan Laporan Button -->
        <button onclick="tampilkanLaporan()" style="background:#1e3a8a; color:#fff; border:none; padding:12px 24px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer; white-space:nowrap;">
            Tampilkan Laporan
        </button>
    </div>
    
    <!-- Action Buttons -->
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
        <button onclick="showModal()" style="background:#1e3a8a; color:#fff; border:none; padding:12px 24px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer; display:flex; align-items:center;">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            + Tambah Data Pemohon
        </button>
        
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <button onclick="exportPDF()" style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:12px 20px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer; display:flex; align-items:center;">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                    <path d="M14 2v6h6"/>
                    <path d="M16 13H8"/>
                    <path d="M16 17H8"/>
                    <path d="M10 9H8"/>
                </svg>
                Export to PDF
            </button>
            
            <button onclick="downloadExcel()" style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:12px 20px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer; display:flex; align-items:center;">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7,10 12,15 17,10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Download Excel
            </button>
            
            <button onclick="cetakLaporan()" style="background:#fff; color:#374151; border:1px solid #d1d5db; padding:12px 20px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer; display:flex; align-items:center;">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                    <polyline points="6,9 6,2 18,2 18,9"/>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                    <rect x="6" y="14" width="12" height="8"/>
                </svg>
                Cetak Laporan
            </button>
        </div>
    </div>
</div>

<!-- Tabel Laporan -->
<div style="background:#fff; border-radius:12px; padding:24px; margin:30px 40px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <h3 style="font-size:1.3rem; font-weight:600; color:#1e3a8a; margin:0 0 8px 0;">Tabel Laporan E-Akta</h3>
    <div style="color:#666; margin-bottom:24px;">Data pengajuan akta periode Juli 2025</div>
    
    <div style="overflow-x:auto;">
        <table id="tabelLaporan" style="width:100%; border-collapse:collapse; font-size:0.95rem;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">No</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Nama Pemohon</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">NIK</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Jenis Akta</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Tanggal Pengajuan</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Status</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Aksi</th>
                </tr>
            </thead>
            <tbody id="tabelBody">
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Data Pemohon -->
<div id="modalTambah" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:1000; display:flex; align-items:center; justify-content:center;">
    <div style="background:#fff; border-radius:12px; padding:32px; width:90%; max-width:500px; box-shadow:0 4px 20px rgba(0,0,0,0.3);">
        <h3 style="font-size:1.5rem; font-weight:600; color:#1e3a8a; margin:0 0 24px 0;">Masukkan data pemohon akta baru</h3>
        
        <form id="formTambah" style="display:flex; flex-direction:column; gap:16px;">
            <div>
                <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Nama Pemohon</label>
                <input type="text" id="namaPemohon" placeholder="Masukkan nama lengkap" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem;">
            </div>
            
            <div>
                <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">NIK</label>
                <input type="text" id="nik" placeholder="Masukkan NIK (16 digit)" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem;">
            </div>
            
            <div>
                <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Jenis Akta</label>
                <select id="jenisAktaModal" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; background:#fff;">
                    <option value="kelahiran">Akta Kelahiran</option>
                    <option value="kematian">Akta Kematian</option>
                    <option value="perkawinan">Akta Perkawinan</option>
                    <option value="perceraian">Akta Perceraian</option>
                </select>
            </div>
            
            <div>
                <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Tanggal Pengajuan</label>
                <input type="date" id="tanggalPengajuan" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem;">
            </div>
            
            <div>
                <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Status</label>
                <select id="status" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; background:#fff;">
                    <option value="diterima">Diterima</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            
            <div>
                <label style="display:block; font-weight:500; margin-bottom:8px; color:#374151;">Keterangan (Opsional)</label>
                <textarea id="keterangan" placeholder="Keterangan tambahan" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:1rem; min-height:80px; resize:vertical;"></textarea>
            </div>
            
            <div style="display:flex; gap:12px; margin-top:16px;">
                <button type="button" onclick="hideModal()" style="flex:1; background:#6b7280; color:#fff; border:none; padding:12px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer;">
                    Batal
                </button>
                <button type="submit" style="flex:1; background:#1e3a8a; color:#fff; border:none; padding:12px; border-radius:8px; font-size:1rem; font-weight:500; cursor:pointer;">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Data dari controller
let dataAkta = @json($dataPemohon);

let currentFilter = 'semua';

// Fungsi untuk menampilkan data
function renderTable(data) {
    const tbody = document.getElementById('tabelBody');
    tbody.innerHTML = '';
    
    data.forEach((item, index) => {
        const row = document.createElement('tr');
        row.style.borderBottom = '1px solid #e2e8f0';
        
        const statusColor = item.status === 'selesai' ? '#16a34a' : 
                           item.status === 'proses' ? '#f59e0b' : 
                           item.status === 'diterima' ? '#3b82f6' : '#ef4444';
        
        row.innerHTML = `
            <td style="padding:12px;">${index + 1}</td>
            <td style="padding:12px; font-weight:500;">${item.nama}</td>
            <td style="padding:12px;">${item.nik}</td>
            <td style="padding:12px;">${item.jenis.charAt(0).toUpperCase() + item.jenis.slice(1)}</td>
            <td style="padding:12px;">${new Date(item.tanggal).toLocaleDateString('id-ID')}</td>
            <td style="padding:12px;"><span style="background:${statusColor}20; color:${statusColor}; padding:4px 8px; border-radius:4px; font-size:0.85rem;">${item.status.charAt(0).toUpperCase() + item.status.slice(1)}</span></td>
            <td style="padding:12px;">
                <button onclick="editData(${item.id})" style="background:#3b82f6; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-size:0.85rem; cursor:pointer; margin-right:4px;">Edit</button>
                <button onclick="deleteData(${item.id})" style="background:#ef4444; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-size:0.85rem; cursor:pointer;">Hapus</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Filter berdasarkan jenis akta
function filterByType(type) {
    currentFilter = type;
    document.getElementById('jenisAkta').value = type;
    filterData();
}

// Filter data
function filterData() {
    const jenisAkta = document.getElementById('jenisAkta').value;
    let filteredData = dataAkta;
    
    if (jenisAkta !== 'semua') {
        filteredData = dataAkta.filter(item => item.jenis === jenisAkta);
    }
    
    renderTable(filteredData);
}

// Modal functions
function showModal() {
    document.getElementById('modalTambah').style.display = 'flex';
}

function hideModal() {
    document.getElementById('modalTambah').style.display = 'none';
    document.getElementById('formTambah').reset();
}

// Form submission dengan AJAX
document.getElementById('formTambah').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = {
        nama_pemohon: document.getElementById('namaPemohon').value,
        nik: document.getElementById('nik').value,
        jenis_akta: document.getElementById('jenisAktaModal').value,
        tanggal_pengajuan: document.getElementById('tanggalPengajuan').value,
        status: document.getElementById('status').value,
        keterangan: document.getElementById('keterangan').value,
        _token: '{{ csrf_token() }}'
    };
    
    // Kirim data ke server menggunakan AJAX
    fetch('/admin/e-akta/tambah-pemohon', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update statistik di halaman
            document.getElementById('totalKelahiran').textContent = data.statistics.total_kelahiran;
            document.getElementById('totalKematian').textContent = data.statistics.total_kematian;
            document.getElementById('totalPengajuan').textContent = data.statistics.total_pengajuan;
            
            // Tambahkan data baru ke array lokal
            const newData = {
                id: dataAkta.length + 1,
                nama: formData.nama_pemohon,
                nik: formData.nik,
                jenis: formData.jenis_akta,
                tanggal: formData.tanggal_pengajuan,
                status: formData.status,
                keterangan: formData.keterangan
            };
            
            dataAkta.push(newData);
            filterData();
            hideModal();
            
            alert(data.message);
        } else {
            alert('Terjadi kesalahan: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menambahkan data');
    });
});

// Other functions
function logout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        window.location.href = '/logout';
    }
}

function tampilkanLaporan() {
    alert('Laporan akan ditampilkan sesuai filter yang dipilih');
}

function exportPDF() {
    alert('Fitur export PDF akan diimplementasikan');
}

function downloadExcel() {
    alert('Fitur download Excel akan diimplementasikan');
}

function cetakLaporan() {
    alert('Fitur cetak laporan akan diimplementasikan');
}

function editData(id) {
    alert('Edit data dengan ID: ' + id);
}

function deleteData(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        dataAkta = dataAkta.filter(item => item.id !== id);
        filterData();
        alert('Data berhasil dihapus!');
    }
}

// Initialize table on page load
document.addEventListener('DOMContentLoaded', function() {
    // Check URL parameters for filter
    const urlParams = new URLSearchParams(window.location.search);
    const filter = urlParams.get('filter');
    
    if (filter) {
        currentFilter = filter;
        document.getElementById('jenisAkta').value = filter;
        filterData();
    } else {
        renderTable(dataAkta);
    }
});
</script>
@endsection 