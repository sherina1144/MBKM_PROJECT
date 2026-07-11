<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi MBKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: #f3d130;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
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

        .hero-section {
            background-color: #f3d130;
            color: #000000;
            padding: 35px 20px;
            border-top: 4px solid #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .hero-section h5 {
            font-weight: 600;
            line-height: 1.5;
            max-width: 950px;
        }

        .badge-periode {
            background-color: #ffffff;
            color: #000000;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .info-card {
            background-color: #f3d130;
            border: none;
            border-radius: 12px;
            padding: 40px 35px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.07);
            max-width: 850px;
            width: 100%;
        }

        .info-card p {
            font-size: 16px;
            line-height: 1.8;
            color: #000000;
            text-align: justify;
            margin: 0;
        }

        footer {
            background-color: #f3d130;
            color: #000000;
            font-size: 13px;
            font-weight: 600;
            padding: 15px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .logo-group img {
                height: 32px;
            }
            .brand-text strong {
                font-size: 12px;
            }
            .hero-section h5 {
                font-size: 15px;
            }
            .info-card {
                padding: 25px 20px;
            }
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
            
            <div class="d-none d-lg-block border-start mx-2" style="height: 40px; border-color: rgba(0,0,0,0.15) !important;"></div>

            <div class="brand-text">
                <small class="d-block lh-1">Sistem Informasi Merdeka Belajar</small>
                <small class="d-block lh-1 mb-1">Teknik Informatika</small>
                <strong class="d-block lh-1">POLITEKNIK NEGERI CILACAP</strong>
            </div>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="{{ url('/login') }}" class="btn btn-light btn-sm rounded-pill px-4 py-2 fw-bold text-dark shadow-sm">
                LOGIN AKUN
            </a>
        </div>
    </div>
</nav>

<div class="hero-section">
    <div class="container text-center text-md-start d-flex flex-column gap-3">
        <h5 class="m-0">
            Selamat datang di Sistem Informasi Merdeka Belajar Kampus Merdeka
            (MBKM) Prodi Teknik Informatika Politeknik Negeri Cilacap!
        </h5>
        <div>
            <span class="badge badge-periode rounded-pill">
                Periode Academic: 2025/2026
            </span>
        </div>
    </div>
</div>

<div class="container flex-grow-1 d-flex align-items-center justify-content-center py-5">
    <div class="card info-card">
        <p>
            <strong style="color: #000000;">Merdeka Belajar – Kampus Merdeka (MBKM)</strong> adalah program dari Kementerian Pendidikan,
            Kebudayaan, Riset, dan Teknologi Republik Indonesia yang memberikan kesempatan kepada mahasiswa untuk
            belajar di luar program studi hingga tiga semester guna meningkatkan kompetensi sesuai kebutuhan industri,
            memperoleh pengalaman nyata di dunia kerja, mengembangkan soft skill and hard skill,
            serta memperluas jejaring profesional.
        </p>
    </div>
</div>

<footer class="text-center">
    &copy; 2026 Politeknik Negeri Cilacap
</footer>

</body>
</html>