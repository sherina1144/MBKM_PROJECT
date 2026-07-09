<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Informasi Mahasiswa</title>

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
            padding: 10px;
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div class="header d-flex justify-content-between">

            <div class="d-flex align-items-center">

                <img src="{{ asset('images/PNC.png') }}" height="50">

                <img src="{{ asset('images/JKB.png') }}" height="50">

                <img src="{{ asset('images/TI.png') }}" height="50">

                <img src="{{ asset('images/mbkm.png') }}" height="50">

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

                    Logout

                </a>

            </div>

        </div>

        <div class="menu">

            <a href="/dosen">

                Dashboard

            </a>

            <a href="/informasi-mahasiswa">

                <b>Informasi Mahasiswa</b>

            </a>

        </div>

        <div class="container-fluid mt-4">

            <h6 class="fw-bold">

                Informasi Mahasiswa

            </h6>

            <form method="GET">

                <div class="row mb-3">

                    <div class="col-md-4 ms-auto">

                        <div class="input-group">

                            <input type="text" name="search" class="form-control" placeholder="Cari Nama Mahasiswa"
                                value="{{ request('search') }}">

                            <button class="btn btn-warning">

                                🔍

                            </button>

                        </div>

                    </div>

                </div>

            </form>

            <table class="table table-bordered bg-white">

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

                        @php

                            $rowspan = $aktivitas->count();

                            $first = true;

                        @endphp

                        @foreach($aktivitas as $item)

                            <tr>

                                @if($first)

                                    <td rowspan="{{ $rowspan }}" class="align-middle text-center">

                                        {{ $item->name }}

                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="align-middle text-center">

                                        {{ $item->nama_program }}

                                    </td>

                                @endif

                                <td>

                                    <b>{{ $item->bulan }}</b><br>

                                    {{ Str::limit($item->progress, 25) }}

                                </td>

                                <td>

                                    {{ $item->komentar ?? '-' }}

                                </td>

                                @if($first)

                                    <td rowspan="{{ $rowspan }}" class="align-middle text-center">

                                        <a href="/detail-mahasiswa/{{ $item->id }}" class="btn btn-detail btn-sm">

                                            Detail

                                        </a>

                                    </td>

                                @endif

                            </tr>

                            @php

                                $first = false;

                            @endphp

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