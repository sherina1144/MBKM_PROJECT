<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Mahasiswa MBKM - POLITEKNIK NEGERI CILACAP</title>
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

        .btn-back-round {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #fff;
            border: 1px solid #cbd5e1;
            text-decoration: none;
            color: #000;
            transition: 0.2s;
        }

        .btn-back-round:hover {
            background-color: #f1f1f1;
            border-color: #94a3b8;
        }

        .detail-wrapper {
            max-width: 850px;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
        }

        .form-control-edit {
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control-edit:focus {
            border-color: #f4d233;
            box-shadow: 0 0 0 3px rgba(244, 210, 51, 0.2);
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
            padding: 8px 16px;
            font-size: 14px;
            vertical-align: middle;
            color: #334155;
            border-color: #e2e8f0;
            background-color: #ffffff;
        }

        .comment-input {
            border: none;
            resize: none;
            background: transparent;
            width: 100%;
            font-size: 13px;
            padding: 6px;
        }

        .comment-input:focus {
            outline: none;
            background-color: #f8fafc;
            border-radius: 4px;
        }

        .btn-save-custom {
            background-color: #212529;
            color: #ffffff;
            border: none;
            font-weight: 600;
            padding: 10px 32px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-save-custom:hover {
            background-color: #000000;
            color: #ffffff;
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
            width: 100%;
            text-align: center;
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

    <div class="container mt-5">
        <a href="javascript:history.back()" class="btn-back-round shadow-sm mb-3">&larr;</a>
    </div>

    <form action="{{ url('/komentar/update/' . $aktivitas->id) }}" method="POST">
        @csrf

        <div class="detail-wrapper">
            <div class="mb-4">
                <h5 class="fw-bold mb-1">Edit Detail Mahasiswa</h5>
                <p class="text-muted mb-0" style="font-size: 14px;">Perbarui data mahasiswa dan tambahkan komentar
                    bimbingan</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3" style="font-size: 14px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mt-3" style="font-size: 14px;">
                    Terjadi kesalahan saat menyimpan data.
                </div>
            @endif

            <div class="row mb-3 align-items-center">
                <div class="col-md-3 fw-bold">Nama Mahasiswa</div>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control form-control-edit"
                        value="{{ old('name', $aktivitas->name) }}" required>
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 fw-bold">Program</div>
                <div class="col-md-9">
                    <input type="text" name="nama_program" class="form-control form-control-edit"
                        value="{{ old('nama_program', $aktivitas->nama_program) }}" required>
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-md-3 fw-bold">Status</div>
                <div class="col-md-9">
                    <select name="status_program" class="form-control form-control-edit" required>
                        <option value="Aktif" {{ $aktivitas->status_program == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Selesai" {{ $aktivitas->status_program == 'Selesai' ? 'selected' : '' }}>Selesai
                        </option>
                        <option value="Dibatalkan" {{ $aktivitas->status_program == 'Dibatalkan' ? 'selected' : '' }}>
                            Dibatalkan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4 align-items-center">
                <div class="col-md-3 fw-bold">Learning Path</div>
                <div class="col-md-9">
                    <textarea name="learning_path" class="form-control form-control-edit" rows="2"
                        required>{{ old('learning_path', $aktivitas->learning_path) }}</textarea>
                </div>
            </div>

            <div class="mt-5">
                <h6 class="fw-bold mb-3">Laporan Progress Bulanan & Komentar Dosen</h6>
                <div class="table-responsive table-custom">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th width="15%">Bulan</th>
                                <th width="45%">Progress Dilaporkan</th>
                                <th width="40%">Komentar Dosen (Edit)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($progress as $index => $item)
                                <tr>
                                    <td class="text-center fw-medium">{{ $item->bulan }}</td>
                                    <td>{{ $item->progress }}</td>
                                    <td>
                                        <input type="hidden" name="progress_ids[]" value="{{ $item->id }}">
                                        <textarea name="komentar[]" class="comment-input" rows="2"
                                            placeholder="Tambahkan komentar...">{{ old('komentar.' . $index, $item->komentar) }}</textarea>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-save-custom shadow-sm">Simpan Perubahan</button>
            </div>
        </div>
    </form>

    <footer class="text-center mt-auto">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>
</body>

</html>