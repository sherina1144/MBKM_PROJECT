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
            width: 96%;
            margin: 25px auto;
        }

        .info-bar {
            background: #f4d233;
            padding: 18px;
            margin-bottom: 70px;
        }

        .table {
            background: white;
        }

        .table th {
            background: #f4d233 !important;
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-warning {
            background: #f4d233;
            border: none;
            color: black;
        }

        .btn-warning:hover {
            background: #e3c11d;
            color: black;
        }

        footer {
            background: #f4d233;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }

        .back-btn {
            font-size: 28px;
            text-decoration: none;
            color: black;
        }

        .modal-header {
            background: #f4d233;
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

                <a href="/profile" class="btn btn-light rounded-pill">

                    {{ session('name') }}

                </a>

                <a href="/logout" class="btn btn-light btn-sm rounded-pill">

                    LOGOUT

                </a>

            </div>

        </div>

        <div class="detail-wrapper">

            <div class="mb-5">

                <a href="/informasi-mahasiswa" class="back-btn">

                    ←

                </a>

            </div>

            <div class="row text-center info-bar">

                <div class="col">

                    {{ $aktivitas->name }}

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

            </div>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th width="120"></th>

                        <th>Progress</th>

                        <th width="260">

                            Komentar

                        </th>

                        <th width="180">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($progress as $item)

                        <tr>

                            <td>

                                {{ $item->bulan }}

                            </td>

                            <td>

                                {{ $item->progress }}

                            </td>

                            <td>

                                {{ $item->komentar ?? '-' }}

                            </td>

                            <td class="text-center">

                                @if(empty($item->komentar))

                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#tambah{{ $item->id }}">

                                        Tambah Komentar

                                    </button>

                                @else

                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $item->komentar_id }}">

                                        Edit Komentar

                                    </button>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    @foreach($progress as $item)

        @if(empty($item->komentar))

            <div class="modal fade" id="tambah{{ $item->id }}" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form action="/komentar/store" method="POST">

                            @csrf

                            <div class="modal-header">

                                <h5 class="modal-title">

                                    Tambah Komentar

                                </h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal">

                                </button>

                            </div>

                            <div class="modal-body">

                                <input type="hidden" name="progress_id" value="{{ $item->id }}">

                                <textarea name="komentar" rows="5" class="form-control" placeholder="Masukkan komentar..."
                                    required></textarea>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                                    Batal

                                </button>

                                <button type="submit" class="btn btn-warning">

                                    Simpan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        @endif

    @endforeach



    {{-- ===========================
    MODAL EDIT KOMENTAR
    =========================== --}}

    @foreach($progress as $item)

        @if(!empty($item->komentar))

            <div class="modal fade" id="edit{{ $item->komentar_id }}" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form action="/komentar/update/{{ $item->komentar_id }}" method="POST">

                            @csrf

                            <div class="modal-header">

                                <h5 class="modal-title">

                                    Edit Komentar

                                </h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal">

                                </button>

                            </div>

                            <div class="modal-body">

                                <textarea name="komentar" rows="5" class="form-control"
                                    required>{{ $item->komentar }}</textarea>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                                    Batal

                                </button>

                                <button type="submit" class="btn btn-warning">

                                    Update

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        @endif

    @endforeach



    <footer>

        © 2026 Politeknik Negeri Cilacap

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>