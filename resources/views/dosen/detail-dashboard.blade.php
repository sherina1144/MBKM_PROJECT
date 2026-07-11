<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa MBKM</title>

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

        .detail-card-custom {
            max-width: 850px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background-color: #f8f9fa;
        }

        .form-control-custom {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            background-color: #ffffff !important;
            color: #334155;
        }

        .table-custom {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .table-custom th {
            background-color: #f4d233 !important;
            color: #000000 !important;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 16px;
            text-align: center;
            border: none;
        }

        .table-custom td {
            padding: 12px 16px;
            font-size: 14px;
            vertical-align: middle;
            color: #334155;
            background-color: #ffffff;
        }

        .btn-secondary-custom {
            background-color: #e2e8f0;
            color: #475569;
            border: none;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 32px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary-custom:hover {
            background-color: #cbd5e1;
            color: #1e293b;
        }

        .btn-logout {
            background-color: #a4abb2;
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #dc3545;
            color: #ffffff;
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
                <a href="{{ url('/profile') }}" class="d-flex align-items-center gap-2 text-dark text-decoration-none">
                    @if(session('foto'))
                        <img src="{{ asset('foto/' . session('foto')) }}" class="rounded-circle border shadow-sm"
                            style="width:40px;height:40px;object-fit:cover;" alt="Foto Profil">
                    @else
                        <img src="{{ asset('images/user.png') }}" class="rounded-circle border shadow-sm"
                            style="width:40px;height:40px;object-fit:cover;" alt="Foto Profil">
                    @endif
                    <span>{{ session('name') }}</span>
                </a>
                <a href="{{ url('/logout') }}" class="btn btn-logout btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm">
                    LOGOUT
                </a>
            </div>
        </div>
    </nav>

    <div class="container my-5 flex-grow-1">
        <div class="card detail-card-custom w-100">
            <div class="card-body p-4 p-md-5">
                <h5 class="fw-bold mb-4" style="color: #000000;">Detail Mahasiswa</h5>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 fw-semibold small text-secondary">Nama Mahasiswa</div>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-custom" value="{{ $aktivitas->name }}"
                            readonly>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 fw-semibold small text-secondary">Program</div>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-custom"
                            value="{{ $aktivitas->nama_program }}" readonly>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-3 fw-semibold small text-secondary">Status</div>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-custom"
                            value="{{ $aktivitas->status_program }}" readonly>
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-3 fw-semibold small text-secondary">Learning Path</div>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-custom"
                            value="{{ $aktivitas->learning_path }}" readonly>
                    </div>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col-12">
                        <h6 class="fw-bold mb-3" style="color: #000000;">Laporan Progress Bulanan</h6>
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 180px;">Bulan</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($progress as $item)
                                        <tr>
                                            <td class="text-center fw-medium">{{ $item->bulan }}</td>
                                            <td class="text-secondary">{{ $item->progress }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="javascript:history.back()" class="btn btn-secondary-custom shadow-sm">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>