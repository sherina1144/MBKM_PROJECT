```php
<!DOCTYPE html>
<html>

<head>

    <title>Edit Program MBKM</title>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#ececec;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        .header{
            background:#f4d233;
            padding:15px 20px;
        }

        .detail-box{
            width:850px;
            margin:40px auto;
            flex:1;
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
            border:none;
            width:120px;
        }

        .btn-simpan:hover{
            background:#0f1836;
            color:white;
        }

        .btn-kembali{
            background:#f4d233;
            border:none;
            width:120px;
        }

        .btn-kembali:hover{
            background:#e3c11d;
        }

        footer{
            background:#f4d233;
            text-align:center;
            padding:10px;
        }

    </style>

</head>

<body>

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

<div class="detail-box">

    <form action="/informasi-mbkm/update/{{ $program->id }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row mb-3 align-items-center">

            <div class="col-md-3">

                Nama Program

            </div>

            <div class="col-md-9">

                <input
                    type="text"
                    name="nama_program"
                    class="form-control"
                    value="{{ $program->nama_program }}">

            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-3">

                Deskripsi

            </div>

            <div class="col-md-9">

                <textarea
                    name="deskripsi"
                    rows="6"
                    class="form-control">{{ $program->deskripsi }}</textarea>

            </div>

        </div>

        <div class="row mb-3 align-items-center">

            <div class="col-md-3">

                Link Pendaftaran

            </div>

            <div class="col-md-9">

                <input
                    type="text"
                    name="link_daftar"
                    class="form-control"
                    value="{{ $program->link_daftar }}">

            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-3">

                Foto Saat Ini

            </div>

            <div class="col-md-9">

                <img
                    src="{{ asset('images/'.$program->gambar) }}"
                    width="300"
                    class="img-thumbnail">

            </div>

        </div>

        <div class="row mb-4 align-items-center">

            <div class="col-md-3">

                Ganti Foto

            </div>

            <div class="col-md-9">

                <input
                    type="file"
                    name="gambar"
                    class="form-control">

            </div>

        </div>

        <div class="text-center">

            <button
                type="submit"
                class="btn btn-simpan me-2">

                Simpan

            </button>

            <a href="/informasi-mbkm"
               class="btn btn-kembali">

                Kembali

            </a>

        </div>

    </form>

</div>

<footer>

    © 2026 Politeknik Negeri Cilacap

</footer>

</body>

</html>