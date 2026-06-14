<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Admin</title>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: #ececec;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
        }

        .header {
            background: #f4d233;
            padding: 15px 20px;
        }

        .menu {
            background: #f4d233;
            padding: 0 20px 15px;
        }

        .menu a {
            text-decoration: none;
            color: black;
            margin-right: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .card-info {
            background: #f4d233;
            border: none;
            height: 120px;
        }

        .card-info .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .search-box {
            width: 250px;
            margin-left: auto;
        }

        .table th {
            background: #f4d233 !important;
            text-align: center;
        }

        .btn-detail {
            background: #f4d233;
            border: none;
        }

        footer {
            background: #f4d233;
            text-align: center;
            padding: 10px;
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div class="header d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">

                <img src="{{ asset('images/PNC.png') }}" height="50" style="padding:3px;">
                <img src="{{ asset('images/JKB.png') }}" height="50" style="padding:3px;">
                <img src="{{ asset('images/TI.png') }}" height="50" style="padding:3px;">
                <img src="{{ asset('images/mbkm.png') }}" height="50" style="padding:3px;">

                <div class="ms-3">

                    <small>Sistem Informasi MBKM Prodi</small><br>
                    <small>Teknik Informatika</small><br>
                    <strong>POLITEKNIK NEGERI CILACAP</strong>

                </div>

            </div>

            <div>

                <a href="/profile" class="btn btn-light btn-sm rounded-pill me-2">

                    {{ session('name') }}

                </a>

                <a href="/logout" class="btn btn-light btn-sm rounded-pill">

                    Logout

                </a>

            </div>

        </div>

        <div class="menu">

            <a href="/admin">
                <b>Dashboard</b>
            </a>

            <a href="#">
                Informasi MBKM
            </a>

        </div>

        <div class="container-fluid mt-4">

            <h6 class="fw-bold mb-3">

                Dashboard

            </h6>

            <div class="row mb-5">

                <div class="col-md-4">

                    <div class="card card-info">

                        <div class="card-body">

                            <small>Total Mahasiswa</small>

                            <h4 class="mt-2">

                                {{ $totalMahasiswa }}

                            </h4>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-info">

                        <div class="card-body">

                            <small>Total Aktivitas</small>

                            <h4 class="mt-2">

                                {{ $totalAktivitas }}

                            </h4>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-info">

                        <div class="card-body">

                            <small>Total Progress</small>

                            <h4 class="mt-2">

                                {{ $totalProgress }}

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

            <div class="search-box mb-3">

                <input type="text" class="form-control" placeholder="Cari Nama Mahasiswa">

            </div>

            <table class="table table-bordered bg-white">

                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Program</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($data as $item)

                        <tr>

                            <td>{{ $item->name }}</td>

                            <td>{{ $item->nama_program }}</td>

                            <td>{{ $item->status_program }}</td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <footer>

        © 2026 Politeknik Negeri Cilacap

    </footer>

</body>

</html>