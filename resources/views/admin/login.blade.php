<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator KIA - Dindukcapil Brebes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
        }
        .header {
            background: #22c55e;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-weight: bold;
            font-size: 1.25rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
            overflow: hidden;
        }
        .login-header {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }
        .shield-icon {
            background: #22c55e;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
        }
        .login-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .login-subtitle {
            color: #6b7280;
            font-size: 0.9rem;
        }
        .login-body {
            padding: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-input:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }
        .input-group {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 18px;
        }
        .input-with-icon {
            padding-left: 40px;
        }
        .login-btn {
            width: 100%;
            background: #22c55e;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .login-btn:hover {
            background: #16a34a;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .error-list {
            list-style: none;
            padding: 0;
        }
        .error-list li {
            margin-bottom: 4px;
        }
        .error-list li:before {
            content: "•";
            color: #dc2626;
            font-weight: bold;
            margin-right: 8px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #22c55e;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .back-link a:hover {
            text-decoration: underline;
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
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        Dashboard Administrator KIA
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Login Card -->
        <div class="login-card">
            <!-- Login Header -->
            <div class="login-header">
                <div class="shield-icon">
                    🛡️
                </div>
                <div class="login-title">Login Administrator</div>
                <div class="login-subtitle">Masukkan kredensial admin untuk mengakses dashboard</div>
            </div>

            <!-- Login Body -->
            <div class="login-body">
                @if ($errors->any())
                    <div class="error-message">
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-icon">👤</span>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                class="form-input input-with-icon" 
                                placeholder="Masukkan username"
                                required 
                                autofocus 
                                autocomplete="username"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-icon">🔒</span>
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                class="form-input input-with-icon" 
                                placeholder="Masukkan password"
                                required 
                                autocomplete="current-password"
                            >
                        </div>
                    </div>

                    <button type="submit" class="login-btn">
                        <span>🚀</span>
                        Login
                    </button>
                </form>

                <div class="back-link">
                    <a href="{{ route('dashboard') }}">
                        <span>🏠</span>
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-text">© 2024 Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes</div>
        <div class="footer-subtext">Sistem E-KIA untuk kemudahan pelayanan masyarakat</div>
    </div>
</body>
</html>