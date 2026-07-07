<!DOCTYPE html>
<html>

<head>

    <title>Detail Mahasiswa MBKM</title>

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

        .detail-wrapper {
            width: 850px;
            margin: 30px auto;
        }

        .form-control {
            border: 1px solid #f4d233;
        }

        .table th,
        .table td {
            border: 1px solid #f4d233;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-kembali {
            background: #f4d233;
            border: none;
            width: 120px;
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

        <div class="detail-wrapper">

            <div class="container mt-4">

                <div class="row mb-3">

                    <div class="col-md-3">
                        Nama Mahasiswa
                    </div>

                    <div class="col-md-6">

                        <input type="text" class="form-control" value="{{ $aktivitas->name }}" readonly>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-3">
                        Program
                    </div>

                    <div class="col-md-6">

                        <input type="text" class="form-control" value="{{ $aktivitas->nama_program }}" readonly>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-3">
                        Status
                    </div>

                    <div class="col-md-6">

                        <input type="text" class="form-control" value="{{ $aktivitas->status_program }}" readonly>

                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-3">
                        Learning Path
                    </div>

                    <div class="col-md-6">

                        <input type="text" class="form-control" value="{{ $aktivitas->learning_path }}" readonly>

                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-md-8">

                        <table class="table table-bordered bg-white">

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

                                @foreach($progress as $item)

                                    @if(!$item->komentar)

                                        <div class="modal fade" id="tambah{{ $item->id }}">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <form action="/komentar/store" method="POST">

                                                        @csrf

                                                        <div class="modal-header">

                                                            <h5>Tambah Komentar</h5>

                                                        </div>

                                                        <div class="modal-body">

                                                            <input type="hidden" name="progress_id" value="{{ $item->id }}">

                                                            <textarea name="komentar" class="form-control" rows="5"
                                                                required></textarea>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button class="btn btn-primary">

                                                                Simpan

                                                            </button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                                @foreach($progress as $item)

                                    @if($item->komentar)

                                        <div class="modal fade" id="edit{{ $item->komentar_id }}">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <form action="/komentar/update/{{ $item->komentar_id }}" method="POST">

                                                        @csrf

                                                        <div class="modal-header">

                                                            <h5>Edit Komentar</h5>

                                                        </div>

                                                        <div class="modal-body">

                                                            <textarea name="komentar" class="form-control"
                                                                rows="5">{{ $item->komentar }}</textarea>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button class="btn btn-warning">

                                                                Update

                                                            </button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="text-center mt-4">

                    <a href="/dosen" class="btn btn-kembali">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

    <footer>

        © 2026 Politeknik Negeri Cilacap

    </footer>

</body>

</html> 