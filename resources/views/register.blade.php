<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register MBKM - POLITEKNIK NEGERI CILACAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: #f3d130;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
        }

        .logo-group img {
            height: 45px;
            object-fit: contain;
        }

        .brand-text small {
            font-size: 11px;
            color: #495057;
            font-weight: 500;
        }

        .brand-text strong {
            font-size: 14px;
            color: #000000;
        }

        .auth-card {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 16px;
            padding: 48px 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            min-height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .mb-3 {
            margin-bottom: 1.5rem !important;
        }

        .mb-4 {
            margin-bottom: 2rem !important;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #f3d130;
            box-shadow: 0 0 0 3px rgba(243, 209, 48, 0.2);
        }

        .btn-submit-auth {
            background-color: #212529;
            color: #ffffff;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
            display: inline-block;
            border: none;
            width: 100%;
        }

        .btn-submit-auth:hover {
            background-color: #000000;
            color: #ffffff;
        }

        footer {
            background-color: #f3d130;
            color: #000000;
            padding: 15px;
            font-weight: 600;
            font-size: 13px;
            margin-top: auto;
        }

        .login-link {
            font-size: 13px;
            color: #495057;
            margin-top: 15px;
        }

        .login-link a {
            color: #000000;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-custom">
        <div class="container">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <div class="logo-group d-flex align-items-center gap-2">
                    <img src="{{ asset('images/PNC.png') }}" alt="PNC">
                    <img src="{{ asset('images/JKB.png') }}" alt="JKB">
                    <img src="{{ asset('images/TI.png') }}" alt="TI">
                    <img src="{{ asset('images/mbkm.png') }}" alt="MBKM">
                </div>
                <div class="d-none d-lg-block border-start mx-2"
                    style="height: 40px; border-color: rgba(0,0,0,0.15) !important;"></div>
                <div class="brand-text">
                    <small class="d-block lh-1">Sistem Informasi Merdeka Belajar</small>
                    <small class="d-block lh-1 mb-1">Teknik Informatika</small>
                    <strong class="d-block lh-1">POLITEKNIK NEGERI CILACAP</strong>
                </div>
            </div>
        </div>
    </nav>

    <div class="container flex-grow-1 d-flex align-items-center justify-content-center py-5">
        <div class="auth-card text-center">
            <img src="{{ asset('images/PNC.png') }}" alt="Logo" style="height: 60px; width: auto; object-fit: contain;"
                class="mb-4">
            <h5 class="fw-bold mb-4">Daftar Akun Baru</h5>

            @if($errors->any())
                <div class="alert alert-danger py-2 small text-start">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register/store" method="POST" class="text-start">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required
                        value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@pnc.ac.id" required
                        value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan sandi" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small">Daftar Sebagai</label>
                    <select name="role" class="form-control" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="dosen">Dosen</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-submit-auth shadow-sm">DAFTAR</button>
                </div>
            </form>

            <div class="text-center login-link">
                Sudah punya akun? <a href="{{ url('/login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>

    <footer class="text-center">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>