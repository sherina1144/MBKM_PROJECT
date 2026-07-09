<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Dosen</title>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
        }

        .card-info {
            background: #f4d233;
            border: none;
            height: 120px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .search-box {
            width: 350px;
            margin-left: auto;
        }

        .search-box .input-group-text {
            background: white;
        }

        .table th {
            background: #f4d233 !important;
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
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

                <a href="/profile" class="btn btn-light rounded-pill">

                    {{ session('name') }}

                </a>
                
                <a href="/logout" class="btn btn-light btn-sm rounded-pill">

                    LOGOUT

                </a>

            </div>

        </div>

        <div class="menu">

            <a href="/dosen"><b>Dashboard</b></a>

            <a href="/informasi-mahasiswa">

                Informasi Mahasiswa

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

                            <b>Total Aktivitas MBKM</b>

                            <h4 class="mt-3">

                                {{ $totalAktivitas }}

                            </h4>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-info">

                        <div class="card-body">

                            <b>MBKM Berlangsung</b>

                            <h4 class="mt-3">

                                {{ $berlangsung }}

                            </h4>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card card-info">

                        <div class="card-body">

                            <b>MBKM Status Selesai</b>

                            <h4 class="mt-3">

                                {{ $selesai }}

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

            <form action="/dosen" method="GET">

                <div class="search-box mb-4">

                    <div class="input-group">

                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari Nama Mahasiswa Bimbingan">

                        <button class="input-group-text">

                            <i class="bi bi-search"></i>

                        </button>

                    </div>

                </div>

            </form>

            <table class="table table-bordered bg-white">

                <thead>

                    <tr>

                        <th>Nama Mahasiswa</th>

                        <th>Program</th>

                        <th>Status</th>

                        <th>Progress</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($data as $aktivitas)

                        @php
                            $rowspan = $aktivitas->count();
                        @endphp

                        @foreach($aktivitas as $index => $item)

                            <tr>

                                @if($index == 0)

                                    <td rowspan="{{ $rowspan }}" class="align-middle text-center">

                                        {{ $item->name }}

                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="align-middle">

                                        {{ $item->nama_program }}

                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="align-middle text-center">

                                        {{ $item->status_program }}

                                    </td>

                                @endif

                                <td>

                                    <b>{{ $item->bulan }}</b><br>

                                    {{ Str::limit($item->progress, 40) }}

                                </td>

                                @if($index == 0)

                                    <td rowspan="{{ $rowspan }}" class="align-middle text-center">

                                        <a href="/detail-dashboard/{{ $item->id }}" class="btn btn-detail btn-sm">

                                            Detail

                                        </a>

                                    </td>

                                @endif

                            </tr>

                        @endforeach

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