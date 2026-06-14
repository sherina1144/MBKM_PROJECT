<!DOCTYPE html>
<html>

<head>

    <title>Tambah Informasi MBKM</title>

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
            font-size:14px;
            font-weight:500;
        }

        .form-area{
            width:900px;
            margin:30px auto;
        }

        .form-control{
            border:1px solid #f4d233;
        }

        .form-control:focus{
            border-color:#f4d233;
            box-shadow:none;
        }

        .btn-simpan{
            background:#16224d;
            color:white;
            width:100px;
            border:none;
        }

        .btn-batal{
            background:#f4d233;
            width:100px;
            border:none;
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

        <a href="/admin">

            Dashboard

        </a>

        <a href="/informasi-mbkm">

            <b>Informasi MBKM</b>

        </a>

    </div>

    <div class="form-area">

        <form
            action="/informasi-mbkm/store"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row mb-3 align-items-center">

                <div class="col-md-2">

                    Nama Program

                </div>

                <div class="col-md-10">

                    <input
                        type="text"
                        name="nama_program"
                        class="form-control">

                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-2">

                    Deskripsi

                </div>

                <div class="col-md-10">

                    <textarea
                        name="deskripsi"
                        rows="6"
                        class="form-control"></textarea>

                </div>

            </div>

            <div class="row mb-3 align-items-center">

                <div class="col-md-2">

                    Link Pendaftaran

                </div>

                <div class="col-md-10">

                    <input
                        type="text"
                        name="link_daftar"
                        class="form-control">

                </div>

            </div>

            <div class="row mb-4 align-items-center">

                <div class="col-md-2">

                    Foto

                </div>

                <div class="col-md-10">

                    <input
                        type="file"
                        name="gambar"
                        class="form-control">

                </div>

            </div>

            <div class="text-center">

                <button
                    type="submit"
                    class="btn btn-simpan me-3">

                    Simpan

                </button>

                <a href="/informasi-mbkm"
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