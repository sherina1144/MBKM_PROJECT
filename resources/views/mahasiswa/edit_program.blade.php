<!DOCTYPE html>
<html>

<head>

    <title>Ubah Program MBKM</title>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            font-weight:500;
            font-size:14px;
        }

        .form-box{
            width:850px;
            margin:35px auto;
        }

        .form-control,
        .form-select{
            border:1px solid #f4d233;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:#f4d233;
            box-shadow:none;
        }

        .btn-simpan{
            background:#16224d;
            color:white;
            border:none;
            width:120px;
        }

        .btn-simpan:hover{
            background:#0d163d;
            color:white;
        }

        .btn-batal{
            background:#f4d233;
            border:none;
            width:120px;
        }

        .btn-batal:hover{
            background:#e5c31d;
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

            <a href="{{ url('/logout') }}"
                 class="btn btn-logout btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm">
                     LOGOUT
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

    <div class="form-box">

        <form action="/update-program/{{ $aktivitas->id }}"
              method="POST">

            @csrf

            <div class="row mb-3 align-items-center">

                <div class="col-md-3">

                    Program MBKM

                </div>

                <div class="col-md-9">

                    <select
                        name="program_id"
                        class="form-select">

                        @foreach($program as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ $aktivitas->program_id == $item->id ? 'selected' : '' }}>

                                {{ $item->nama_program }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="row mb-3 align-items-center">

                <div class="col-md-3">

                    Status Program

                </div>

                <div class="col-md-9">

                    <select
                        name="status_program"
                        class="form-select">

                        <option
                            value="Berlangsung"
                            {{ $aktivitas->status_program == 'Berlangsung' ? 'selected' : '' }}>

                            Berlangsung

                        </option>

                        <option
                            value="Selesai"
                            {{ $aktivitas->status_program == 'Selesai' ? 'selected' : '' }}>

                            Selesai

                        </option>

                    </select>

                </div>

            </div>

            <div class="row mb-4 align-items-center">

                <div class="col-md-3">

                    Learning Path

                </div>

                <div class="col-md-9">

                    <input
                        type="text"
                        name="learning_path"
                        class="form-control"
                        value="{{ $aktivitas->learning_path }}">

                </div>

            </div>

            <div class="text-center">

                <button
                    type="submit"
                    class="btn btn-simpan me-2">

                    Simpan

                </button>

                <a href="/aktivitas"
                   class="btn btn-batal">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<footer>

    © 2026 Politeknik Negeri Cilacap

</footer>

</body>

</html>