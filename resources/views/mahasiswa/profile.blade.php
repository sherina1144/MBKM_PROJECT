<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Halaman Akun</title>

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

        .profile-card {
            width: 220px;
            height: 220px;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .15);
        }

        .profile-card img {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .profile-icon {
            font-size: 130px;
            color: #bdbdbd;
        }

        .form-control {
            border: 1px solid #f4d233;
        }

        .form-control:focus {
            border-color: #f4d233;
            box-shadow: none;
        }

        .btn-profile {
            background: #2d62e8;
            color: white;
            border: none;
            padding: 8px 30px;
        }

        .btn-profile:hover {
            background: #1f4fc4;
            color: white;
        }

        footer {
            background: #f4d233;
            text-align: center;
            padding: 10px;
        }

        .back-btn {
            text-decoration: none;
            color: black;
            font-size: 25px;
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

                <a href="/logout" class="btn btn-light btn-sm rounded-pill">

                    LOGOUT

                </a>

            </div>

        </div>

        <div class="container mt-4">

            <a href="/mahasiswa" class="back-btn">

                ←

            </a>

            <form action="/profile/update" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row mt-5 align-items-start">

                    <div class="col-md-4 d-flex justify-content-center">

                        <div class="profile-card">

                            @if(isset($user->foto) && $user->foto)

                                <img src="{{ asset('profile/' . $user->foto) }}">

                            @else

                                <i class="bi bi-person-circle profile-icon"></i>

                            @endif

                        </div>

                    </div>

                    <div class="col-md-8">

                        <div class="row mb-3">

                            <div class="col-md-3">

                                Nama

                            </div>

                            <div class="col-md-9">

                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3">

                                Status

                            </div>

                            <div class="col-md-9">

                                <input type="text" value="{{ ucfirst($user->role) }}" class="form-control" readonly>

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3">

                                Email

                            </div>

                            <div class="col-md-9">

                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">

                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-md-3">

                                Ubah Foto Profil

                            </div>

                            <div class="col-md-9">

                                <input type="file" name="foto" class="form-control">

                            </div>

                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn btn-profile">

                                Ubah Profil

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

</html>