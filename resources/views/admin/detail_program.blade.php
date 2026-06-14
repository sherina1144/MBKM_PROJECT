<!DOCTYPE html>
<html>

<head>

    <title>Detail Program MBKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#ececec;
        }

        .header{
            background:#f4d233;
            padding:15px 20px;
        }

        .detail-box{
            width:850px;
            margin:40px auto;
        }

        .form-control{
            border:1px solid #f4d233;
        }

        .form-control:focus{
            box-shadow:none;
            border-color:#f4d233;
        }

        .btn-kembali{
            background:#f4d233;
            border:none;
            width:120px;
        }

        footer{
            background:#f4d233;
            text-align:center;
            padding:10px;
            margin-top:50px;
        }

    </style>

</head>

<body>

<div class="header d-flex justify-content-between align-items-center">

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

</div>

<div class="detail-box">

    <div class="row mb-3">

        <div class="col-md-3">

            Nama Program

        </div>

        <div class="col-md-9">

            <input
                type="text"
                class="form-control"
                value="{{ $program->nama_program }}"
                readonly>

        </div>

    </div>

    <div class="row mb-3">

        <div class="col-md-3">

            Deskripsi

        </div>

        <div class="col-md-9">

            <textarea
                class="form-control"
                rows="6"
                readonly>{{ $program->deskripsi }}</textarea>

        </div>

    </div>

    <div class="row mb-3">

        <div class="col-md-3">

            Link Pendaftaran

        </div>

        <div class="col-md-9">

            <input
                type="text"
                class="form-control"
                value="{{ $program->link_daftar }}"
                readonly>

        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-3">

            Foto

        </div>

        <div class="col-md-9">

            <img
                src="{{ asset('program/'.$program->gambar) }}"
                width="300"
                class="img-thumbnail">

        </div>

    </div>

    <div class="text-center">

        <a href="/informasi-mbkm"
           class="btn btn-kembali">

            Kembali

        </a>

    </div>

</div>

<footer>

    © 2026 Politeknik Negeri Cilacap

</footer>

</body>

</html>