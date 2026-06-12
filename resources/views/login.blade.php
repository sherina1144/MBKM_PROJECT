<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MBKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #e9e9e9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: #f4d233;
            height: 80px;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            height: 45px;
            margin-right: 5px;
        }

        .title {
            font-size: 15px;
            line-height: 1;
        }

        .login-card {
            width: 320px;
            height: 420px;
            margin: auto;
            border: 1px solid #f4d233;
            border-radius: 10px;
            background: white;
            box-shadow: 0 3px 8px rgba(0, 0, 0, .15);
        }

        .logo-login {
            width: 75px;
        }

        .form-control {
            border: 1px solid #f4d233;
            height: 35px;
            font-size: 12px;
        }

        .form-label {
            font-size: 12px;
            margin-bottom: 3px;
        }

        .btn-login {
            background: #f4d233;
            border: none;
            color: black;
            height: 35px;
            font-size: 13px;
        }

        .btn-login:hover {
            background: #e6c217;
        }

        .btn-kembali {
            background: #e9edf0;
            border: none;
            color: black;
        }

        .btn-kembali:hover {
            background: #91969b;
            color: white;
        }

        footer {
            background: #f4d233;
            text-align: center;
            padding: 12px;
            margin-top: auto;
        }
    </style>

</head>

<body>

    <div class="header">

        <img src="{{ asset('images/PNC.png') }}" class="logo">
        <img src="{{ asset('images/JKB.png') }}" class="logo">
        <img src="{{ asset('images/TI.png') }}" class="logo">
        <img src="{{ asset('images/mbkm.png') }}" class="logo">

        <div class="title">

            Sistem Informasi MBKM Prodi<br>
            Teknik Informatika<br>
            <strong>POLITEKNIK NEGERI CILACAP</strong>

        </div>
        <div class="ms-auto">

            <a href="/" class="btn btn-kembali ">
                ← Kembali
            </a>

        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center flex-grow-1">

        <div class="card login-card">

            <div class="card-body p-4">

                <div class="text-center mb-1">

                    <img src="{{ asset('images/PNC.png') }}" class="logo-login">

                </div>

                <h5 class="text-center mb-3">
                    Masuk dan Verifikasi
                </h5>

                @if(session('error'))

                    <div class="alert alert-danger">

                        {{ session('error') }}

                    </div>

                @endif

                <form action="/proses-login" method="POST">

                    @csrf

                    <div class="mb-1">

                        <label class="form-label">
                            Email/Nama Akun Pengguna
                        </label>

                        <input type="text" name="email" class="form-control"
                            placeholder="Masukan email/NIM/NIP/Nama Pengguna" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Kata Sandi
                        </label>

                        <input type="password" name="password" class="form-control" placeholder="Masukan kata sandi"
                            required>

                    </div>
                    <div style="margin-top:40px;">
                        <button type="submit" class="btn btn-login w-100">

                            Masuk

                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <footer>
        © 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>