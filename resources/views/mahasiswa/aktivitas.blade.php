<!DOCTYPE html>
<html>

<head>

    <title>Aktivitas MBKM</title>

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
            font-weight: 500;
            font-size: 14px;
        }

        .judul {
            padding: 20px;
            font-weight: bold;
        }

        .info-bar {
            background: #f4d233;
            padding: 12px;
        }

        .table-area {
            width: 85%;
            margin: 40px auto;
        }

        .table {
            background: white;
        }

        .table th {
            background: #f4d233 !important;
            text-align: center;
        }

        .btn-program {
            text-decoration: none;
            color: black;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-program:hover {
            color: black;
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

        <div class="menu">

            <a href="/mahasiswa">
                Dashboard
            </a>

            <a href="/aktivitas">
                <b>Aktivitas MBKM</b>
            </a>

            <a href="/progress">
                Progress
            </a>

        </div>

        <div class="judul">

            Aktivitas MBKM

        </div>

        <div class="info-bar">

            @if($aktivitas)

                <div class="row text-center align-items-center">

                    <div class="col">

                        {{ session('name') }}

                    </div>

                    <div class="col">

                        {{ $aktivitas->nama_program }}

                    </div>

                    <div class="col">

                        {{ $aktivitas->status_program }}

                    </div>

                    <div class="col">

                        {{ $aktivitas->learning_path }}

                    </div>

                    <div class="col">

                        <a href="/edit-program/{{ $aktivitas->id }}" class="btn btn-sm btn-outline-dark">

                            Ubah Program

                        </a>

                    </div>

                </div>

            @else

                <div class="row text-center align-items-center">

                    <div class="col">

                        {{ session('name') }}

                    </div>

                    <div class="col">

                        Tidak Ada Program

                    </div>

                    <div class="col">

                        <a href="/tambah-program" class="btn-program">

                            + Tambah Program

                        </a>

                    </div>

                </div>

            @endif

        </div>

        <div class="table-area">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th width="150">
                            Bulan
                        </th>

                        <th>
                            Progress
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @if(count($progress) > 0)

                        @foreach($progress as $item)

                            <tr>

                                <td class="text-center">

                                    {{ $item->bulan }}

                                </td>

                                <td>

                                    {{ $item->progress }}

                                </td>

                            </tr>

                        @endforeach

                    @else

                        <tr>

                            <td class="text-center">

                                -

                            </td>

                            <td>

                                Belum ada progress

                            </td>

                        </tr>

                    @endif

                </tbody>

            </table>

        </div>

    </div>

    <footer>

        © 2026 Politeknik Negeri Cilacap

    </footer>

</body>

</html>