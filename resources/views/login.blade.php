<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MBKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#e9e9e9;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        .header{
            background:#f4d233;
            height:80px;
            display:flex;
            align-items:center;
            padding:0 20px;
        }

        .logo{
            height:45px;
            margin-right:10px;
        }

        .title{
            font-size:14px;
            line-height:1.2;
        }

        .login-card{
            width:520px;
            min-height:420px;
            margin:auto;
            border:1px solid #f4d233;
            border-radius:10px;
            background:white;
            box-shadow:0 3px 8px rgba(0,0,0,.15);
        }

        .logo-login{
            width:90px;
        }

        .form-control{
            border:1px solid #f4d233;
        }

        .btn-login{
            background:#f4d233;
            border:none;
            color:black;
        }

        .btn-login:hover{
            background:#e6c217;
        }

        footer{
            background:#f4d233;
            text-align:center;
            padding:12px;
            margin-top:auto;
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

</div>

<div class="container d-flex justify-content-center align-items-center flex-grow-1">

    <div class="card login-card">

        <div class="card-body p-5">

            <div class="text-center mb-4">

                <img
                    src="{{ asset('images/logo-pnc.png') }}"
                    class="logo-login">

            </div>

            <h3 class="text-center mb-5">
                Masuk dan Verifikasi
            </h3>

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif

            <form action="/proses-login" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Email/Nama Akun Pengguna
                    </label>

                    <input
                        type="text"
                        name="email"
                        class="form-control"
                        placeholder="Masukan email/NIM/NIP/Nama Pengguna"
                        required>

                </div>

                <div class="mb-5">

                    <label class="form-label">
                        Kata Sandi
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukan kata sandi"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-login w-100">

                    Masuk

                </button>

            </form>

        </div>

    </div>

</div>

<footer>
    © 2026 Politeknik Negeri Cilacap
</footer>

</body>
</html>