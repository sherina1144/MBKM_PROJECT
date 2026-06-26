<!DOCTYPE html>
<html>

<head>

    <title>Informasi Mahasiswa</title>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        html,
        body{
            height:100%;
            margin:0;
        }

        body{
            background:#ececec;
            display:flex;
            flex-direction:column;
            font-family:Poppins,sans-serif;
        }

        .wrapper{
            flex:1;
        }

        .header{
            background:#f4d233;
            padding:15px 20px;
        }

        .menu{
            background:#f4d233;
            padding:0 20px 15px;
        }

        .menu a{

            text-decoration:none;
            color:black;
            margin-right:20px;
            font-size:14px;
            font-weight:500;

        }

        .menu a:hover{

            color:black;

        }

        .title{

            padding:20px;
            font-weight:bold;

        }

        .search-box{

            width:350px;
            margin-left:auto;

        }

        .table{

            background:white;

        }

        .table th{

            background:#f4d233 !important;
            text-align:center;
            vertical-align:middle;

        }

        .table td{

            vertical-align:middle;

        }

        .btn-detail{

            background:#f4d233;
            border:none;
            width:70px;

        }

        .btn-detail:hover{

            background:#e4c01d;

        }

        footer{

            background:#f4d233;
            text-align:center;
            padding:10px;

        }

    </style>

</head>

<body>

<div class="wrapper">

    <div class="header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">

            <img src="{{ asset('images/PNC.png') }}"
                 height="50"
                 style="padding:3px;">

            <img src="{{ asset('images/JKB.png') }}"
                 height="50"
                 style="padding:3px;">

            <img src="{{ asset('images/TI.png') }}"
                 height="50"
                 style="padding:3px;">

            <img src="{{ asset('images/mbkm.png') }}"
                 height="50"
                 style="padding:3px;">

            <div class="ms-3">

                <small>Sistem Informasi MBKM Prodi</small><br>

                <small>Teknik Informatika</small><br>

                <strong>POLITEKNIK NEGERI CILACAP</strong>

            </div>

        </div>

        <div>

            <a href="/profile"
               class="btn btn-light btn-sm rounded-pill me-2">

                {{ session('name') }}

            </a>

            <a href="/logout"
               class="btn btn-light btn-sm rounded-pill">

                LOGOUT

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

    <div class="container-fluid mt-3">

        <h6 class="fw-bold">

            Informasi Mahasiswa

        </h6>

        <div class="d-flex justify-content-end mb-4">

            <form action="/informasi-mahasiswa"
                  method="GET"
                  class="search-box">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari Nama Mahasiswa">

                    <button
                        class="btn btn-outline-secondary">

                        🔍

                    </button>

                </div>

            </form>

        </div>

        <table class="table table-bordered">

            <thead>

            <tr>

                <th width="220">

                    Nama Mahasiswa

                </th>

                <th width="260">

                    Program

                </th>

                <th width="120">

                    Bulan

                </th>

                <th>

                    Progress

                </th>

                <th width="220">

                    Komentar

                </th>

                <th width="110">

                    Action

                </th>

            </tr>

            </thead>

            <tbody>

            @foreach($mahasiswa as $item)

            <tr>

                <td>

                    {{ $item->name }}

                </td>

                <td>

                    {{ $item->nama_program }}

                </td>

                <td class="text-center">

                    {{ $item->bulan }}

                </td>

                <td>

                    {{ Str::limit($item->progress,40) }}

                </td>

                <td>

                    {{ $item->komentar ?? '-' }}

                </td>

                <td class="text-center">

                    <a href="/detail-mahasiswa/{{ $item->id }}"
                       class="btn btn-detail btn-sm">

                        Detail

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