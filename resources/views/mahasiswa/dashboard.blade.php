<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

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

        .nav-menu-container {
            background-color: #f3d130;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
        }

        .nav-menu-container a {
            text-decoration: none;
            color: #495057;
            font-weight: 500;
            font-size: 14px;
            padding: 6px 15px;
            border-radius: 20px;
            transition: all 0.2s ease;
        }

        .nav-menu-container a:hover {
            color: #000000;
            background-color: rgba(255, 255, 255, 0.4);
        }

        .nav-menu-container a.active {
            color: #000000;
            background-color: #ffffff;
            font-weight: 700;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .program-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            background: #ffffff;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .program-card img {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .btn-daftar {
            background-color: #f3d130;
            border: none;
            color: #000000;
            font-weight: 600;
            font-size: 13px;
            padding: 8px 24px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(243, 209, 48, 0.3);
            transition: all 0.2s ease;
        }

        .btn-daftar:hover {
            background-color: #e2c128;
            color: #000000;
            transform: translateY(-1px);
        }

        .btn-logout {
            background-color: #a4abb2;
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #dc3545;
            color: #ffffff;
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

            .nav-menu-container a {
                font-size: 13px;
                padding: 4px 10px;
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
                <div class="brand-text">
                    <small class="d-block lh-1">Sistem Informasi Merdeka Belajar</small>
                    <small class="d-block lh-1 mb-1">Teknik Informatika</small>
                    <strong class="d-block lh-1">POLITEKNIK NEGERI CILACAP</strong>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="{{ url('/profile') }}" class="d-flex align-items-center gap-2 text-dark text-decoration-none">
                    @if(session('foto'))
                        <img src="{{ asset('foto/' . session('foto')) }}" class="rounded-circle border shadow-sm"
                            style="width:40px;height:40px;object-fit:cover;" alt="Foto Profil">
                    @else
                        <img src="{{ asset('images/user.png') }}" class="rounded-circle border shadow-sm"
                            style="width:40px;height:40px;object-fit:cover;" alt="Foto Profil">
                    @endif
                    <span>{{ session('name') }}</span>
                </a>
                <a href="{{ url('/logout') }}" class="btn btn-logout btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm">
                    LOGOUT
                </a>
            </div>
        </div>
    </nav>

    <div class="nav-menu-container">
        <div class="container d-flex gap-2 flex-wrap">
            <a href="{{ url('/mahasiswa') }}" class="active">Dashboard</a>
            <a href="{{ url('/aktivitas') }}">Aktivitas MBKM</a>
            <a href="{{ url('/progress') }}">Progress</a>
        </div>
    </div>

    <div class="container my-5 flex-grow-1">
        <div class="mb-4">
            <h4 class="fw-bold mb-1">Dashboard MBKM</h4>
            <p class="text-muted mb-0" style="font-size: 14px;">Informasi Pendaftaran Program MBKM</p>
        </div>

        <div class="row mt-4">
            @forelse($program as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card program-card">
                        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama_program }}">
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div>
                                <h5 class="fw-bold mb-2" style="font-size: 16px; color: #000000;">
                                    {{ $item->nama_program }}
                                </h5>
                                <p class="text-secondary mb-4"
                                    style="font-size: 13px; line-height: 1.6; text-align: justify;">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                            <div class="text-center mt-auto">
                                <a href="{{ $item->link_daftar }}" target="_blank" class="btn btn-daftar w-100">
                                    Daftar Program
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning border-0 shadow-sm p-3">
                        Belum ada program MBKM yang tersedia saat ini.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="text-center">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>