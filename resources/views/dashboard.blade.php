<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi MBKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#e9e9e9;
        }

        .navbar-custom{
            background:#f3d130;
            min-height:80px;
        }

        .hero-section{
            background:#f3d130;
            padding:15px 20px;
        }

        .info-card{
            background:#f3d130;
            border:none;
            border-radius:6px;
            max-width:850px;
            margin:auto;
            padding:50px 35px;
            box-shadow:0 2px 8px rgba(0,0,0,0.15);
        }

        footer{
            background:#f3d130;
            padding:10px;
        }

        .logo{
            height:50px;
        }

        .btn-login{
            background:white;
            border-radius:20px;
            font-size:12px;
            padding:6px 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom">
    <div class="container-fluid">

        <div class="d-flex align-items-center">

            <img src="{{ asset('images/PNC.png') }}" class="logo me-2">
            <img src="{{ asset('images/JKB.png') }}" class="logo me-2">
            <img src="{{ asset('images/TI.png') }}" class="logo me-3">
            <img src="{{ asset('images/mbkm.png') }}" class="logo me-3">

            <div>
                <small>Sistem Informasi Merdeka Belajar</small><br>
                <small>Teknik Informatika</small><br>
                <strong>POLITEKNIK NEGERI CILACAP</strong>
            </div>

        </div>

        <a href="/login" class="btn btn-light btn-sm rounded-pill px-3">
            LOGIN AKUN
        </a>

    </div>
</nav>

<div class="bg-white py-3"></div>

<div class="hero-section">
    <h5>
        Selamat datang di Sistem Informasi Merdeka Belajar Kampus Merdeka
        (MBKM) Prodi Teknik Informatika Politeknik Negeri Cilacap!
    </h5>

    <h6>
        <strong>Periode Akademik</strong> 2025/2026
    </h6>
</div>

<div class="container py-5">

    <div class="card info-card">

        <p style="font: size 20px;">

            <strong>
                Merdeka Belajar – Kampus Merdeka (MBKM)
            </strong>

            adalah program dari Kementerian Pendidikan,
            Kebudayaan, Riset, dan Teknologi Republik Indonesia
            yang memberikan kesempatan kepada mahasiswa untuk
            belajar di luar program studi hingga tiga semester
            guna meningkatkan kompetensi sesuai kebutuhan industri,
            memperoleh pengalaman nyata di dunia kerja,
            mengembangkan soft skill dan hard skill,
            serta memperluas jejaring profesional.

        </p>

    </div>

</div>

<footer class="text-center">
    © 2026 Politeknik Negeri Cilacap
</footer>

</body>
</html>