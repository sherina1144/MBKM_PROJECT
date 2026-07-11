<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            font-family: 'Inter', sans-serif;
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: #f4d233;
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
            background-color: #f4d233;
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

        .card-info-custom {
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-top: 4px solid #f4d233;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease;
        }

        .card-info-custom:hover {
            transform: translateY(-2px);
        }

        .card-info-custom .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .search-box-custom {
            max-width: 300px;
            width: 100%;
        }

        .form-control-custom {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            box-shadow: 0 0 0 3px rgba(244, 210, 51, 0.25);
            border-color: #f4d233;
        }

        .table-custom {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .table-custom th {
            background-color: #f4d233 !important;
            color: #000000 !important;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 16px;
            text-align: center;
            border: none;
        }

        .table-custom td {
            padding: 12px 16px;
            font-size: 14px;
            vertical-align: middle;
            color: #334155;
        }

        .btn-outline-dark-custom {
            background-color: transparent;
            color: #212529;
            border: 1px solid #212529;
            font-weight: 600;
            font-size: 13px;
            padding: 6px 16px;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-outline-dark-custom:hover {
            background-color: #212529;
            color: #ffffff;
        }

        footer {
            background-color: #f4d233;
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
                <div class="d-none d-lg-block border-start mx-2"
                    style="height: 40px; border-color: rgba(0,0,0,0.15) !important;"></div>
                <div class="brand-text">
                    <small class="d-block lh-1">Sistem Informasi Merdeka Belajar</small>
                    <small class="d-block lh-1 mb-1">Teknik Informatika</small>
                    <strong class="d-block lh-1">POLITEKNIK NEGERI CILACAP</strong>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mt-2 mt-md-0">
                <div class="d-flex align-items-center gap-2 text-dark">

                    <img src="{{ !empty($user->foto) ? asset('foto/' . $user->foto) : asset('images/default-user.png') }}"
                        class="rounded-circle border shadow-sm" style="width:40px;height:40px;object-fit:cover;">

                    <span>{{ session('name') }}</span>

                </div>

                <a href="{{ url('/logout') }}" class="btn btn-dark btn-sm rounded-pill px-3 shadow-sm">
                    LOGOUT
                </a>
            </div>
        </div>
    </nav>

    <div class="nav-menu-container">
        <div class="container d-flex gap-2 flex-wrap">
            <a href="{{ url('/admin') }}" class="active">Dashboard</a>
            <a href="{{ url('/informasi-mbkm') }}">Informasi MBKM</a>
        </div>
    </div>

    <div class="container my-4 flex-grow-1">
        <h5 class="fw-bold mb-2" style="color: #000000;">Dashboard Admin</h5>
        <p class="text-muted mb-4" style="font-size: 14px;">Selamat datang di dashboard admin</p>
        <div class="row g-3 mb-5">
            <div class="col-md-4">
                <div class="card card-info-custom">
                    <div class="card-body">
                        <small class="text-secondary fw-semibold text-uppercase" style="font-size: 11px;">Total
                            Aktivitas MBKM</small>
                        <h3 class="mt-2 mb-0 fw-bold text-dark">{{ $totalAktivitas }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info-custom">
                    <div class="card-body">
                        <small class="text-secondary fw-semibold text-uppercase" style="font-size: 11px;">MBKM
                            Berlangsung</small>
                        <h3 class="mt-2 mb-0 fw-bold" style="color: #b58900;">{{ $berlangsung }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info-custom">
                    <div class="card-body">
                        <small class="text-secondary fw-semibold text-uppercase" style="font-size: 11px;">MBKM Status
                            Selesai</small>
                        <h3 class="mt-2 mb-0 fw-bold text-success">{{ $selesai }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h6 class="fw-bold mb-0" style="color: #000000;">Daftar Aktivitas Mahasiswa</h6>

            <form action="{{ url('/admin') }}" method="GET" class="search-box-custom" id="searchForm">
                <div class="input-group shadow-sm rounded-3 overflow-hidden">
                    <input type="text" name="search" id="searchInput"
                        class="form-control form-control-custom border-end-0" placeholder="Cari Nama Mahasiswa..."
                        value="{{ request('search') }}">
                    <button class="btn btn-dark fw-semibold px-3" type="submit"
                        style="font-size: 14px; background-color: #212529; border: 1px solid #cbd5e1; border-left: none;">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <script>
            document.getElementById('searchInput').addEventListener('input', function () {
                if (this.value.trim() === '') {
                    document.getElementById('searchForm').submit();
                }
            });
        </script>
        <div class="table-responsive mb-5">
            <table class="table table-custom table-striped table-hover bg-white mb-0">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aktivitas as $item)
                        <tr>
                            <td class="fw-medium">{{ $item->name }}</td>
                            <td>{{ $item->nama_program }}</td>
                            <td>
                                @if($item->status_program == 'Berlangsung')
                                    <span
                                        class="badge bg-warning text-dark px-2.5 py-1.5 rounded">{{ $item->status_program }}</span>
                                @else
                                    <span class="badge bg-success px-2.5 py-1.5 rounded">{{ $item->status_program }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/detail-mbkm/' . $item->id) }}" class="btn-outline-dark-custom shadow-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>