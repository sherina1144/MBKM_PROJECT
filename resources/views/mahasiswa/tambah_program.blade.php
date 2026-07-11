<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program MBKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            font-family: 'Inter', sans-serif;
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: #f4d233;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
        }

        .logo-group img {
            height: 45px;
            object-fit: contain;
        }

        .brand-text small {
            font-size: 11px;
            color: #495057;
            font-weight: 500;
        }

        .brand-text strong {
            font-size: 14px;
            color: #000000;
        }

        .nav-menu-container {
            background-color: #f4d233;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
        }

        .nav-menu-container a {
            text-decoration: none;
            color: #495057;
            font-weight: 500;
            font-size: 14px;
            padding: 6px 15px;
            border-radius: 20px;
            transition: all 0.2s ease;
        }

        .nav-menu-container a:hover {
            color: #000000;
            background-color: rgba(255, 255, 255, 0.4);
        }

        .nav-menu-container a.active {
            color: #000000;
            background-color: #ffffff;
            font-weight: 700;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .form-card-custom {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            background-color: #f8f9fa;
        }

        .form-control-custom,
        .form-select-custom {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            background-color: #ffffff;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            box-shadow: 0 0 0 3px rgba(244, 210, 51, 0.25);
            border-color: #f4d233;
        }

        .btn-primary-custom {
            background-color: #212529;
            color: #ffffff;
            border: none;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 28px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background-color: #000000;
            color: #ffffff;
        }

        .btn-secondary-custom {
            background-color: #e2e8f0;
            color: #475569;
            border: none;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 28px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-secondary-custom:hover {
            background-color: #cbd5e1;
            color: #1e293b;
        }

        footer {
            background-color: #f4d233;
            color: #000000;
            font-size: 13px;
            font-weight: 600;
            padding: 15px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .logo-group img {
                height: 32px;
            }

            .brand-text strong {
                font-size: 12px;
            }

            .nav-menu-container a {
                font-size: 13px;
                padding: 4px 10px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-custom">
        <div class="container">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <div class="logo-group d-flex align-items-center gap-2">
                    <img src="{{ asset('images/PNC.png') }}" alt="PNC">
                    <img src="{{ asset('images/JKB.png') }}" alt="JKB">
                    <img src="{{ asset('images/TI.png') }}" alt="TI">
                    <img src="{{ asset('images/mbkm.png') }}" alt="MBKM">
                </div>
                <div class="brand-text">
                    <small class="d-block lh-1">Sistem Informasi Merdeka Belajar</small>
                    <small class="d-block lh-1 mb-1">Teknik Informatika</small>
                    <strong class="d-block lh-1">POLITEKNIK NEGERI CILACAP</strong>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="{{ url('/profile') }}"
                    class="btn btn-light btn-sm rounded-pill px-3 py-2 fw-bold text-dark shadow-sm">
                    {{ session('name') }}
                </a>
                <a href="{{ url('/logout') }}" class="btn btn-dark btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm">
                    LOGOUT
                </a>
            </div>
        </div>
    </nav>

    <div class="nav-menu-container">
        <div class="container d-flex gap-2 flex-wrap">
            <a href="{{ url('/mahasiswa') }}">Dashboard</a>
            <a href="{{ url('/aktivitas') }}" class="active">Aktivitas MBKM</a>
            <a href="{{ url('/progress') }}">Progress</a>
        </div>
    </div>

    <div class="container mt-5 flex-grow-1">
        <div class="mb-4">
            <a href="{{ url('/aktivitas') }}" class="btn btn-dark btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm"
                style="font-size: 13px;">
                &larr; Kembali
            </a>
        </div>

        <div class="card form-card-custom mb-5">
            <div class="card-body p-4 p-md-5">
                <h4 class="fw-bold mb-4 text-center text-md-start" style="color: #000000;">Tambah Program MBKM</h4>

                <form action="{{ url('/simpan-program') }}" method="POST">
                    @csrf

                    <div class="row mb-4 align-items-center">
                        <label class="col-md-3 fw-semibold small text-secondary mb-2 mb-md-0">Nama Program</label>
                        <div class="col-md-9">
                            <select name="program_id" class="form-select form-select-custom" required>
                                @foreach($program as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_program }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4 align-items-center">
                        <label class="col-md-3 fw-semibold small text-secondary mb-2 mb-md-0">Status</label>
                        <div class="col-md-9">
                            <select name="status_program" class="form-select form-select-custom" required>
                                <option value="Berlangsung">Berlangsung</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-5 align-items-center">
                        <label class="col-md-3 fw-semibold small text-secondary mb-2 mb-md-0">Learning Path</label>
                        <div class="col-md-9">
                            <input type="text" name="learning_path" class="form-control form-control-custom"
                                placeholder="Contoh: Fullstack Web Developer" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <button type="submit" class="btn btn-primary-custom shadow-sm">
                            Simpan
                        </button>
                        <a href="{{ url('/aktivitas') }}" class="btn btn-secondary-custom shadow-sm">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="text-center">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>