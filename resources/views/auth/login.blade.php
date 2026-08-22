<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Admin BPKAD</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #800000;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            /* Warna dasar jika gambar tidak ada */
            background-color: #e2e8f0;
            /* Ganti gambar background di folder public/images/background-login.jpg */
            background-image: url('{{ asset("images/background-login.jpeg") }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10%;
            position: relative;
        }

        /* Overlay putih/abu untuk membuat background terlihat transparan/pudar (opacity rendah) */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255, 255, 255, 0.85); /* 0.85 = tingkat kepudaran/transparansi background */
            z-index: 1;
        }

        .login-card {
            background: white;
            width: 400px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2; /* Di atas overlay */
            border-top: 5px solid var(--primary);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-logo {
            margin-bottom: 20px;
            height: 40px;
            object-fit: contain;
        }

        .login-card h2 {
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 5px;
            font-weight: 700;
        }

        .login-card p {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .form-group {
            width: 100%;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary);
        }

        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: #660000;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            font-size: 0.85rem;
            color: var(--text-light);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .back-link:hover {
            color: var(--text-dark);
        }
        
        .footer-text {
            text-align: center;
            font-size: 0.7rem;
            color: #94a3b8;
            margin-top: 30px;
        }
        
        .error-message {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 6px;
            font-size: 0.85rem;
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <img src="{{ asset('images/logo-bpkad.png') }}" alt="Logo BPKAD" class="login-logo" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'40\'><rect width=\'100\' height=\'40\' fill=\'%23e2e8f0\'/></svg>'">
        
        <h2>Portal Admin BPKAD</h2>
        <p>Silakan masuk untuk mengelola agenda dinas</p>

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" style="width: 100%;">
            @csrf
            
            <div class="form-group">
                <label>Email / Username</label>
                <input type="text" name="login" class="form-control" placeholder="nama@bpkad.go.id atau admin" required autofocus>
            </div>
            
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
            </div>
            
            <button type="submit" class="btn-submit">
                Masuk ke Dashboard 
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
        </form>

        <a href="{{ route('display') }}" class="back-link">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Kembali ke Layar Informasi
        </a>
        
        <div class="footer-text">
            Badan Pengelolaan Keuangan dan Aset Daerah - Sistem Admin v2.0
        </div>
    </div>

</body>
</html>
