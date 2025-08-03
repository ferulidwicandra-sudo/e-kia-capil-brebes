<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrator KIA - Dindukcapil Brebes</title>
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
            background: #22c55e;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .logout-btn {
            background: white;
            color: #333;
            border: 1px solid #d1d5db;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }
        .logout-btn:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .main-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .dashboard-header {
            padding: 30px 40px;
            border-bottom: 1px solid #e5e7eb;
        }
        .dashboard-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }
        .shield-icon {
            background: #22c55e;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        .title-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        .subtitle {
            color: #6b7280;
            font-size: 1rem;
            margin-left: 44px;
        }
        .stats-container {
            padding: 30px 40px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .stat-card {
            flex: 1;
            min-width: 200px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .stat-icon {
            font-size: 2rem;
            margin-bottom: 12px;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .applications-section {
            padding: 30px 40px;
            border-top: 1px solid #e5e7eb;
        }
        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .section-icon {
            background: #3b82f6;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        .section-text {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }
        .empty-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            opacity: 0.5;
        }
        .empty-text {
            font-size: 1.1rem;
        }
        .footer {
            background: #1f2937;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
        .footer-text {
            font-size: 0.9rem;
            margin-bottom: 4px;
        }
        .footer-subtext {
            font-size: 0.8rem;
            color: #9ca3af;
        }
        .debug-info {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            padding: 16px;
            margin: 20px;
            border-radius: 8px;
            color: #92400e;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-title">Dashboard Administrator KIA</div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="{{ route('dashboard') }}" class="logout-btn" style="background: #3b82f6; color: white; border-color: #3b82f6;">
                <span>🏠</span>
                Kembali ke Dashboard
            </a>
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span>→</span>
                Logout
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Debug Info -->
    @if(config('app.debug'))
    <div class="debug-info">
        <strong>Debug Info:</strong><br>
        - User: {{ Auth::user()->name ?? 'Not logged in' }}<br>
        - Email: {{ Auth::user()->email ?? 'No email' }}<br>
        - Pengajuan Count: {{ isset($pengajuans) ? $pengajuans->count() : 0 }}<br>
        - Route: {{ request()->route()->getName() ?? 'No route' }}
    </div>
    @endif

    <!-- Main Container -->
    <div class="container">
        <!-- Main Card -->
        <div class="main-card">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div class="dashboard-title">
                    <div class="shield-icon">🛡️</div>
                    <div class="title-text">Dashboard Admin</div>
                </div>
                <div class="subtitle">Kelola pengajuan Kartu Identitas Anak</div>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon">📄</div>
                    <div class="stat-number">{{ isset($pengajuans) ? $pengajuans->count() : 0 }}</div>
                    <div class="stat-label">Total KIA</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">⏰</div>
                    <div class="stat-number">{{ isset($pengajuans) ? $pengajuans->where('status', 'menunggu')->count() : 0 }}</div>
                    <div class="stat-label">Menunggu</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">✅</div>
                    <div class="stat-number">{{ isset($pengajuans) ? $pengajuans->where('status', 'diterima')->count() : 0 }}</div>
                    <div class="stat-label">Diterima</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">❌</div>
                    <div class="stat-number">{{ isset($pengajuans) ? $pengajuans->where('status', 'ditolak')->count() : 0 }}</div>
                    <div class="stat-label">Ditolak</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">⚠️</div>
                    <div class="stat-number">{{ isset($pengajuans) ? $pengajuans->where('status', 'revisi')->count() : 0 }}</div>
                    <div class="stat-label">Perlu Revisi</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div style="padding: 20px 40px; border-bottom: 1px solid #e5e7eb;">
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="/admin/statistics" style="
                        background: #3b82f6; 
                        color: white; 
                        padding: 12px 20px; 
                        border-radius: 8px; 
                        text-decoration: none; 
                        font-weight: 500;
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        transition: background 0.2s;
                    " onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                        📊 Lihat Statistik Akta
                    </a>
                    <a href="/admin/e-akta" style="
                        background: #22c55e; 
                        color: white; 
                        padding: 12px 20px; 
                        border-radius: 8px; 
                        text-decoration: none; 
                        font-weight: 500;
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        transition: background 0.2s;
                    " onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                        📋 Sistem E-Akta
                    </a>
                </div>
            </div>

            <!-- Applications Section -->
            <div class="applications-section">
                <div class="section-title">
                    <div class="section-icon">👥</div>
                    <div class="section-text">Daftar Pengajuan KIA</div>
                </div>
                
                @if(isset($pengajuans) && $pengajuans->count() > 0)
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: #f8fafc; border-bottom: 2px solid #e5e7eb;">
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">#</th>
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Nama Anak</th>
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">NIK Anak</th>
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">NIK Ortu</th>
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Tgl Lahir</th>
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Status</th>
                                    <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuans as $index => $pengajuan)
                                    <tr style="border-bottom: 1px solid #e5e7eb;">
                                        <td style="padding: 12px;">{{ $index + 1 }}</td>
                                        <td style="padding: 12px;">{{ $pengajuan->nama_lengkap_anak ?? 'N/A' }}</td>
                                        <td style="padding: 12px;">{{ $pengajuan->nik_anak ?? 'N/A' }}</td>
                                        <td style="padding: 12px;">{{ $pengajuan->nik_orang_tua ?? 'N/A' }}</td>
                                        <td style="padding: 12px;">{{ $pengajuan->tanggal_lahir_anak ?? 'N/A' }}</td>
                                        <td style="padding: 12px;">
                                            <span style="
                                                padding: 4px 8px; 
                                                border-radius: 4px; 
                                                font-size: 0.8rem; 
                                                font-weight: 500;
                                                background: {{ ($pengajuan->status ?? '') == 'diterima' ? '#dcfce7' : (($pengajuan->status ?? '') == 'ditolak' ? '#fee2e2' : '#fef3c7') }};
                                                color: {{ ($pengajuan->status ?? '') == 'diterima' ? '#166534' : (($pengajuan->status ?? '') == 'ditolak' ? '#dc2626' : '#92400e') }};
                                            ">
                                                {{ ucfirst($pengajuan->status ?? 'menunggu') }}
                                            </span>
                                        </td>
                                        <td style="padding: 12px;">
                                            <button style="
                                                background: #22c55e; 
                                                color: white; 
                                                border: none; 
                                                padding: 6px 12px; 
                                                border-radius: 4px; 
                                                font-size: 0.8rem; 
                                                cursor: pointer;
                                            " onclick="editPengajuan({{ $pengajuan->id ?? 0 }})">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">📄</div>
                        <div class="empty-text">Belum ada pengajuan KIA yang masuk ke sistem.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-text">© 2024 Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes</div>
        <div class="footer-subtext">Sistem E-KIA untuk kemudahan pelayanan masyarakat</div>
    </div>

    <script>
        function editPengajuan(id) {
            // Implementasi edit pengajuan
            alert('Edit pengajuan dengan ID: ' + id);
        }
    </script>
</body>
</html>