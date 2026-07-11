<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas MBKM</title>

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

        .info-bar-custom {
            background-color: #f3d130;
            padding: 18px 0;
            font-weight: 700;
            color: #000000;
            font-size: 16px;
        }

        .select-status-custom {
            font-size: 14px;
            font-weight: 600;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 6px 30px 6px 12px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        .select-status-custom {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 700;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 6px 30px 6px 16px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            width: auto !important;
            display: inline-block;
        }

        .select-status-custom:focus {
            background-color: #212529;
            color: #ffffff;
            box-shadow: none;
            border: none;
        }

        .table-custom {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .table-custom thead th {
            background-color: #f3d130 !important;
            color: #000000 !important;
            font-weight: 700;
            border-bottom: none;
            padding: 12px;
            font-size: 14px;
        }

        .table-custom tbody td {
            padding: 14px;
            font-size: 14px;
            vertical-align: middle;
        }

        .btn-program-action {
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.2s ease;
            background-color: #0d6efd;
            color: #ffffff;
        }

        .btn-program-action:hover {
            background-color: #0b5ed7;
            color: #ffffff;
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

            .info-bar-custom {
                font-size: 14px;
                padding: 15px 0;
            }

            .info-bar-custom .row>div {
                margin-bottom: 8px;
                text-align: center !important;
            }

            .info-bar-custom .row>div:last-child {
                margin-bottom: 0;
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
            <a href="{{ url('/mahasiswa') }}">Dashboard</a>
            <a href="{{ url('/aktivitas') }}" class="active">Aktivitas MBKM</a>
            <a href="{{ url('/progress') }}">Progress</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="mb-4">
            <h4 class="fw-bold mb-1">Aktivitas MBKM</h4>
            <p class="text-muted mb-0" style="font-size: 14px;">Pantau status program dan riwayat progress bulanan Anda
            </p>
        </div>
    </div>

    <<div class="info-bar-custom mb-4">
        <div class="container">
            @if($aktivitas)
                <div class="row text-center align-items-center g-3">
                    <div class="col-md-2 text-md-start text-truncate fw-semibold">
                        {{ session('name') }}
                    </div>

                    <div class="col-md-5 text-center fw-medium">
                        {{ $aktivitas->nama_program }}
                    </div>

                    <div class="col-md-2 text-center">
                        <form action="{{ url('/update-status-program/' . $aktivitas->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status_program" class="form-select select-status-custom mx-auto"
                                style="max-width: 140px;" onchange="this.form.submit();">
                                <option value="Berlangsung" {{ $aktivitas->status_program == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                <option value="Selesai" {{ $aktivitas->status_program == 'Selesai' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>
                        </form>
                    </div>

                    <div class="col-md-3 text-md-end text-center text-truncate">
                        {{ $aktivitas->learning_path }}
                    </div>
                </div>
            @else
                <div class="row text-center align-items-center g-2">
                    <div class="col-md-4 text-md-start text-truncate fw-semibold">
                        {{ session('name') }}
                    </div>
                    <div class="col-md-4 text-center text-muted fw-medium">
                        Tidak Ada Program Aktif
                    </div>
                    <div class="col-md-4 text-md-end text-center">
                        <a href="{{ url('/tambah-program') }}"
                            class="btn  btn-program-action px-4 py-2 d-inline-block shadow-sm">
                            Tambah Program
                        </a>
                    </div>
                </div>
            @endif
        </div>
        </div>

        <div class="container mb-5 flex-grow-1">
            <div class="table-responsive table-custom">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="200" class="text-center">Bulan</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($progress) > 0)
                            @foreach($progress as $item)
                                <tr>
                                    <td class="text-center fw-bold text-secondary">
                                        {{ $item->bulan }}
                                    </td>
                                    <td class="text-wrap" style="line-height: 1.6;">
                                        {{ $item->progress }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center text-muted">-</td>
                                <td class="text-muted" style="font-style: italic;">Belum ada catatan progress yang
                                    ditambahkan.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="text-center">
            &copy; 2026 Politeknik Negeri Cilacap
        </footer>

</body>

</html>