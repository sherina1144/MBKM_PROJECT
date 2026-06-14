<!DOCTYPE html>
<html>

<head>

    <title>Progress MBKM</title>

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

        .menu {
            background: #f4d233;
            padding: 0 20px 15px;
        }

        .menu a {
            text-decoration: none;
            color: black;
            margin-right: 20px;
            font-weight: 500;
            font-size: 14px;
        }

        .form-card {
            width: 450px;
            margin: 40px auto;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .15);
        }

        .logo-progress {
            width: 90px;
        }

        .form-control {
            border: 1px solid #f4d233;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #f4d233;
        }

        .btn-tambah {
            background: #2d62e8;
            color: white;
            border: none;
        }

        .btn-tambah:hover {
            background: #1f4fc4;
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

                <a href="/logout" class="btn btn-light rounded-pill">

                    Logout

                </a>

            </div>

        </div>

        <div class="menu">

            <a href="/mahasiswa">
                Dashboard
            </a>

            <a href="/aktivitas">
                Aktivitas MBKM
            </a>

            <a href="/progress">
                <b>Progress</b>
            </a>

        </div>

        <div class="card form-card">

            <div class="card-body p-4">

                <div class="text-center">

                    <img src="{{ asset('images/PNC.png') }}" class="logo-progress">

                </div>

                <h4 class="text-center mt-3 mb-4">

                    Form Progress

                </h4>

                <form action="/simpan-progress" method="POST">

                    @csrf

                    <input type="hidden" name="aktivitas_id" value="{{ $aktivitas->id }}">

                    <div class="mb-3">

                        <label class="form-label">

                            Bulan

                        </label>

                        <input type="text" name="bulan" class="form-control" placeholder="Contoh: September 2026"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">

                            Isi Progress

                        </label>

                        <textarea name="progress" rows="5" class="form-control"
                            placeholder="Tuliskan progress yang telah dikerjakan" required></textarea>

                    </div>

                    <button type="submit" class="btn btn-tambah w-100">

                        Tambah

                    </button>

                </form>

            </div>

        </div>

    </div>

    <footer>

        © 2026 Politeknik Negeri Cilacap

    </footer>

</body>

</html>