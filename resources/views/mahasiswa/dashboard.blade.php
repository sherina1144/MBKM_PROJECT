<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #ececec;
        }

        .header {
            background: #f4d233;
            padding: 15px 25px;
        }

        .menu {
            background: #f4d233;
            padding-bottom: 15px;
        }

        .menu a {
            text-decoration: none;
            color: black;
            margin-right: 20px;
            font-weight: 500;
        }

        .program-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .15);
            transition: .3s;
            height: 100%;
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .program-card img {
            height: 180px;
            object-fit: cover;
        }

        .btn-daftar {
            background: white;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
            width: 120px;
        }

        footer {
            background: #f4d233;
            padding: 10px;
            margin-top: 50px;
        }
    </style>

</head>

<body>

    <div class="header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">

            <img src="{{ asset('images/PNC.png') }}" height="50" style="padding: 3px;">
            <img src="{{ asset('images/JKB.png') }}" height="50" style="padding: 3px;">
            <img src="{{ asset('images/TI.png') }}" height="50" style="padding: 3px;">
            <img src="{{ asset('images/mbkm.png') }}" height="50" style="padding: 3px;">

            <div class="ms-3">

                <small>Sistem Informasi MBKM Prodi</small><br>
                <small>Teknik Informatika</small><br>
                <strong>POLITEKNIK NEGERI CILACAP</strong>

            </div>

        </div>

        <div>

            <a href="{{ url('/profile') }}" class="btn btn-light btn-sm rounded-pill me-2">

                {{ session('name') }}

            </a>

            <a href="/logout" class="btn btn-light rounded-pill">
                Logout
            </a>

        </div>

    </div>

    <div class="menu px-4">

        <a href="/mahasiswa"><b>Dashboard</b></a>
        <a href="/aktivitas">Aktivitas MBKM</a>
        <a href="/progress">Progress</a>

    </div>

    <div class="container mt-4">

        <h5><b>Dashboard MBKM</b></h5>

        <small>Informasi Pendaftaran Program MBKM</small>

        <div class="row mt-5 justify-content-center">

            @forelse($program as $item)

                <div class="col-md-4 mb-4">

                    <div class="card program-card">

                        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama_program }}">

                        <div class="card-body">

                            <h6>
                                <b>{{ $item->nama_program }}</b>
                            </h6>

                            <p style="font-size:13px">

                                {{ $item->deskripsi }}

                            </p>

                            <div class="text-center">

                                <a href="{{ $item->link_daftar }}" target="_blank" class="btn btn-daftar">

                                    Daftar

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">

                        Belum ada program MBKM.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

    <footer class="text-center">
        © 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>