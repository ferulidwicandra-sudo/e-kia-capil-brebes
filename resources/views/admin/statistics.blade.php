<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Statistik Akta - Dindukcapil Brebes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
        }
        .header {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .logout-btn {
            background: white;
            color: #333;
            border: 1px solid #d1d5db;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #22c55e;
            margin-bottom: 10px;
        }
        .stat-label {
            color: #666;
            font-size: 1rem;
        }
        .table-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .table-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-menunggu { background: #fef3c7; color: #92400e; }
        .status-diterima { background: #d1fae5; color: #065f46; }
        .status-ditolak { background: #fee2e2; color: #991b1b; }
        .status-revisi { background: #dbeafe; color: #1e40af; }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-success { background: #22c55e; color: white; }
        .btn-warning { background: #f59e0b; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-title">📊 Dashboard Statistik Akta - Dindukcapil Brebes</div>
        <a href="/admin" class="logout-btn">← Kembali ke Dashboard</a>
    </div>

    <div class="container">
        <!-- Statistik Umum -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ number_format($totalAllAkta) }}</div>
                <div class="stat-label">Total Semua Akta</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($totalBulanIni) }}</div>
                <div class="stat-label">Total Bulan Ini</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($totalTahunIni) }}</div>
                <div class="stat-label">Total Tahun Ini</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($totalKia) }}</div>
                <div class="stat-label">Total KIA</div>
            </div>
        </div>

        <!-- Tabel Statistik Detail -->
        <div class="table-container">
            <div class="table-title">📈 Statistik Detail per Jenis Akta</div>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Akta</th>
                        <th>Total Keseluruhan</th>
                        <th>Bulan Ini</th>
                        <th>Tahun Ini</th>
                        <th>Terakhir Update</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statistics as $stat)
                    <tr>
                        <td>
                            <strong>{{ strtoupper($stat->jenis_akta) }}</strong>
                        </td>
                        <td>{{ number_format($stat->total_akta) }}</td>
                        <td>{{ number_format($stat->total_bulan_ini) }}</td>
                        <td>{{ number_format($stat->total_tahun_ini) }}</td>
                        <td>{{ $stat->last_updated->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #666;">
                            Belum ada data statistik
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tabel Pengajuan KIA Terbaru -->
        <div class="table-container" style="margin-top: 20px;">
            <div class="table-title">📋 Pengajuan KIA Terbaru</div>
            <table>
                <thead>
                    <tr>
                        <th>NIK Anak</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $recentKia = \App\Models\PengajuanKia::orderBy('created_at', 'desc')->limit(10)->get();
                    @endphp
                    @forelse($recentKia as $kia)
                    <tr>
                        <td>{{ $kia->nik_anak }}</td>
                        <td>{{ $kia->nama_lengkap_anak }}</td>
                        <td>{{ $kia->tanggal_lahir_anak->format('d/m/Y') }}</td>
                        <td>
                            <span class="status-badge status-{{ $kia->status }}">
                                {{ ucfirst($kia->status) }}
                            </span>
                        </td>
                        <td>{{ $kia->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #666;">
                            Belum ada pengajuan KIA
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tombol Aksi -->
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="refreshStats()">🔄 Refresh Statistik</button>
            <button class="btn btn-warning" onclick="resetMonthly()">📅 Reset Bulanan</button>
            <button class="btn btn-danger" onclick="resetYearly()">📆 Reset Tahunan</button>
            <a href="/admin" class="btn btn-success">🏠 Dashboard Utama</a>
        </div>
    </div>

    <script>
        function refreshStats() {
            location.reload();
        }

        function resetMonthly() {
            if (confirm('Yakin ingin mereset statistik bulanan? Ini akan mengatur ulang semua total bulan ini menjadi 0.')) {
                fetch('/admin/statistics/reset-monthly', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Statistik bulanan berhasil direset!');
                        location.reload();
                    }
                });
            }
        }

        function resetYearly() {
            if (confirm('Yakin ingin mereset statistik tahunan? Ini akan mengatur ulang semua total tahun ini menjadi 0.')) {
                fetch('/admin/statistics/reset-yearly', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Statistik tahunan berhasil direset!');
                        location.reload();
                    }
                });
            }
        }
    </script>
</body>
</html> 