<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Mahasiswa</title>

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

        .table-custom tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-custom tbody tr:hover {
            background-color: #f1f1f1 !important;
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
        }

        .btn-outline-dark-custom {
            background-color: transparent;
            color: #212529;
            border: 1px solid #212529;
            font-weight: 600;
            font-size: 13px;
            padding: 6px 16px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-outline-dark-custom:hover {
            background-color: #212529;
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
            background-color: #f4d233;
            color: #000000;
            font-size: 13px;
            font-weight: 600;
            padding: 15px;
            margin-top: auto;
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
            <a href="/dosen" class="{{ Request::is('dosen') ? 'active' : '' }}">Dashboard</a>
            <a href="/informasi-mahasiswa" class="{{ Request::is('informasi-mahasiswa*') ? 'active' : '' }}">Informasi
                Mahasiswa</a>
        </div>
    </div>

    <div class="container my-4 flex-grow-1">
        <div class="mb-4">
            <h5 class="fw-bold mb-1" style="color: #000000;">Informasi Mahasiswa</h5>
            <p class="text-muted mb-0" style="font-size: 14px;">Lihat informasi mahasiswa bimbingan Anda</p>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <form method="GET" action="/informasi-mahasiswa" class="search-box-custom" id="searchForm">
                <div class="input-group shadow-sm rounded-3 overflow-hidden">
                    <input type="text" name="search" id="searchInput"
                        class="form-control form-control-custom border-end-0" placeholder="Cari Nama Mahasiswa..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-dark fw-semibold px-3"
                        style="background-color: #212529;">Cari</button>
                </div>
            </form>
        </div>

        <div class="table-responsive mb-5">
            <table class="table table-custom table-striped table-hover bg-white mb-0">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Program</th>
                        <th>Progress</th>
                        <th>Komentar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $aktivitas)
                        @foreach($aktivitas as $index => $item)
                            <tr>
                                @if($index == 0)
                                    <td class="fw-medium" rowspan="{{ $aktivitas->count() }}">{{ $item->name }}</td>
                                    <td rowspan="{{ $aktivitas->count() }}">{{ $item->nama_program }}</td>
                                @endif
                                <td>
                                    <b>{{ $item->bulan }}</b><br>
                                    <small class="text-muted">{{ Str::limit($item->progress, 25) }}</small>
                                </td>
                                <td>{{ $item->komentar ?? '-' }}</td>
                                @if($index == 0)
                                    <td class="text-center" rowspan="{{ $aktivitas->count() }}">
                                        <a href="/detail-mahasiswa/{{ $item->id }}"
                                            class="btn-outline-dark-custom shadow-sm">Detail</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center">&copy; 2026 Politeknik Negeri Cilacap</footer>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            if (this.value.trim() === '') {
                document.getElementById('searchForm').submit();
            }
        });
    </script>
</body>

</html>