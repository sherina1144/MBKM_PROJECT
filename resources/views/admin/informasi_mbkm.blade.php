<!DOCTYPE html>
<html>

<head>

    <title>Informasi MBKM</title>

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

        .judul {
            padding: 15px 25px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-create {
            background: #f4d233;
            border: none;
            padding: 10px 25px;
        }

        .table {
            background: white;
        }

        .table th {
            background: #f4d233 !important;
            text-align: center;
            font-weight: 500;
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

                    LOGOUT

                </a>

            </div>

        </div>

        <div class="menu">

            <a href="/admin">

                Dashboard

            </a>

            <a href="/informasi-mbkm">

                <b>Informasi MBKM</b>

            </a>

        </div>

        <div class="judul">

            Informasi MBKM

        </div>

        <div class="container-fluid px-4">

            <div class="text-end mb-4">

                <a href="/informasi-mbkm/create" class="btn btn-create">

                    Create/Tambah

                </a>

            </div>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>Nama Program</th>
                        <th>Deskripsi</th>
                        <th>Link Pendaftaran</th>
                        <th>Foto</th>
                        <th width="140">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($program as $item)

                        <tr>

                            <td>

                                {{ $item->nama_program }}

                            </td>

                            <td>

                                {{ substr($item->deskripsi, 0, 80) }}

                            </td>

                            <td>

                                <a href="{{ $item->link_daftar }}" target="_blank">

                                    {{ $item->link_daftar }}

                                </a>

                            </td>

                            <td class="text-center">

                                <img src="{{ asset('program/' . $item->gambar) }}" width="100">

                            </td>

                            <td class="text-center">

                                <a href="/informasi-mbkm/detail/{{ $item->id }}" class="btn btn-detail btn-sm">

                                    Detail

                                </a>

                                <a href="/informasi-mbkm/delete/{{ $item->id }}" class="btn btn-danger btn-sm">

                                    Hapus

                                </a>

                            </td>

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