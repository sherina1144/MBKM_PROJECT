<!DOCTYPE html>
<html>

<head>

    <title>Tambah Program MBKM</title>

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

        .form-card {
            max-width: 900px;
            margin: 50px auto;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
        }

        .form-control,
        .form-select {
            border: 1px solid #f4d233;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            border-color: #f4d233;
        }

        .btn-simpan {
            background: #172042;
            color: white;
            border: none;
            min-width: 100px;
        }

        .btn-simpan:hover {
            background: #172042;
            color: white;
        }

        .btn-batal {
            background: #f4d233;
            color: black;
            border: none;
            min-width: 100px;
        }

        .btn-batal:hover {
            background: #e6c217;
            color: black;
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

            <div>

                <button class="btn btn-light btn-sm rounded-pill me-2">

                    {{ session('name') }}

                </button>

                <a href="/logout" class="btn btn-light btn-sm rounded-pill">

                    LOGOUT

                </a>

            </div>

        </div>

        <div class="ms-auto"></div>
            <a href="/aktivitas" class="btn btn-outline-secondary btn-sm mb-4">

            ← Kembali

            </a>
        </div>

    <div class="container">

        <div class="card form-card">

            <div class="card-body p-5">

                <form action="/simpan-program" method="POST">

                    @csrf

                    <div class="row mb-4 align-items-center">

                        <label class="col-md-3 fw-semibold">

                            Nama Program

                        </label>

                        <div class="col-md-9">

                            <select name="program_id" class="form-select" required>

                                @foreach($program as $item)

                                    <option value="{{ $item->id }}">

                                        {{ $item->nama_program }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="row mb-4 align-items-center">

                        <label class="col-md-3 fw-semibold">

                            Status

                        </label>

                        <div class="col-md-9">

                            <select name="status_program" class="form-select" required>

                                <option value="Berlangsung">

                                    Berlangsung

                                </option>

                                <option value="Selesai">

                                    Selesai

                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="row mb-5 align-items-center">

                        <label class="col-md-3 fw-semibold">

                            Learning Path

                        </label>

                        <div class="col-md-9">

                            <input type="text" name="learning_path" class="form-control"
                                placeholder="Contoh: Fullstack Web Developer" required>

                        </div>

                    </div>

                    <div class="text-center">

                        <button type="submit" class="btn btn-simpan me-2">

                            Simpan

                        </button>

                        <a href="/aktivitas" class="btn btn-batal">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

    </div>

    <footer>

        © 2026 Politeknik Negeri Cilacap

    </footer>

</body>

</html>