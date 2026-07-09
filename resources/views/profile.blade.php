<!DOCTYPE html>
<html>

<head>

    <title>Profile</title>

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

        .content {
            width: 900px;
            margin: 30px auto;
        }

        .back {
            font-size: 28px;
            color: black;
            text-decoration: none;
        }

        .foto {
            width: 170px;
            height: 170px;
            border: 1px solid #ddd;
            object-fit: cover;
            background: white;
        }

        .form-control {
            border: 1px solid #f4d233;
        }

        .btn-update {
            width: 170px;
            background: royalblue;
            color: white;
            border: none;
        }

        .btn-update:hover {
            background: #2455c3;
            color: white;
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

    <div class="content">

        <a href="javascript:history.back()" class="back">

            ←

        </a>

        @if(session('success'))

            <div class="alert alert-success mt-3">

                {{ session('success') }}

            </div>

        @endif

        <form action="/profile/update"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row mt-4">

                <div class="col-md-4 text-center">

                    @if($user->foto)

                        <img src="{{ asset('foto/'.$user->foto) }}"
                            class="foto">

                    @else

                        <img src="{{ asset('images/user.png') }}"
                            class="foto">

                    @endif

                </div>

                <div class="col-md-8">

                    <div class="row mb-3">

                        <label class="col-md-3">

                            Nama

                        </label>

                        <div class="col-md-7">

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $user->name }}">

                        </div>

                    </div>

                    <div class="row mb-3">

                        <label class="col-md-3">

                            Status

                        </label>

                        <div class="col-md-7">

                            <input
                                type="text"
                                class="form-control"
                                value="{{ ucfirst($user->role) }}"
                                readonly>

                        </div>

                    </div>

                    <div class="row mb-3">

                        <label class="col-md-3">

                            Email

                        </label>

                        <div class="col-md-7">

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ $user->email }}">

                        </div>

                    </div>

                    <div class="row mb-4">

                        <label class="col-md-3">

                            Ubah Foto Profil

                        </label>

                        <div class="col-md-7">

                            <input
                                type="file"
                                name="foto"
                                class="form-control">

                        </div>

                    </div>

                    <div class="text-center">

                        <button
                            class="btn btn-update">

                            Ubah Profil

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

<footer>

    © 2026 Politeknik Negeri Cilacap

</footer>

</body>

</html>