<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

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

        .profile-card-custom {
            max-width: 850px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background-color: #f8f9fa;
            position: relative;
        }

        .btn-back-round {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 50%;
            color: #475569;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .btn-back-round:hover {
            background-color: #f1f5f9;
            color: #0f172a;
            transform: translateX(-2px);
        }

        .profile-avatar {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .form-control-custom {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            background-color: #ffffff;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            box-shadow: 0 0 0 3px rgba(244, 210, 51, 0.25);
            border-color: #f4d233;
        }

        .form-control-custom[readonly] {
            background-color: #e2e8f0 !important;
            color: #64748b;
        }

        .btn-primary-custom {
            background-color: #212529;
            color: #ffffff;
            border: none;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 40px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background-color: #000000;
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

    <div class="wrapper d-flex flex-column flex-grow-1">

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

        <div class="container my-5 flex-grow-1 d-flex flex-column justify-content-center">

            <div class="max-width-850 w-100 mx-auto mb-3">
                <a href="javascript:history.back()" class="btn-back-round shadow-sm" title="Kembali">
                    &larr;
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success max-width-850 w-100 mx-auto rounded-3 shadow-sm mb-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger max-width-850 w-100 mx-auto rounded-3 shadow-sm mb-3">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card profile-card-custom w-100">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-5 text-center text-md-start" style="color: #000000;">Profil Pengguna</h4>

                    <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-4 text-center border-end-md">
                                <div class="mb-3">
                                    @if($user->foto)
                                        <img src="{{ asset('foto/' . $user->foto) }}" class="profile-avatar">
                                    @else
                                        <img src="{{ asset('images/user.png') }}" class="profile-avatar">
                                    @endif
                                </div>
                                <span
                                    class="badge bg-dark px-3 py-2 rounded-pill fw-semibold">{{ ucfirst($user->role) }}</span>
                            </div>

                            <div class="col-md-8">
                                <div class="row mb-3 align-items-center">
                                    <label class="col-md-3 fw-semibold small text-secondary">Nama Lengkap</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control form-control-custom"
                                            value="{{ $user->name }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <label class="col-md-3 fw-semibold small text-secondary">Status Akses</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-custom"
                                            value="{{ ucfirst($user->role) }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <label class="col-md-3 fw-semibold small text-secondary">Alamat Email</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control form-control-custom"
                                            value="{{ $user->email }}" required>
                                    </div>
                                </div>

                                <div class="row mb-5 align-items-center">
                                    <label class="col-md-3 fw-semibold small text-secondary">Ganti Foto</label>
                                    <div class="col-md-9">
                                        <input type="file" name="foto" class="form-control form-control-custom">
                                    </div>
                                </div>

                                <div class="text-center text-md-start offset-md-3">
                                    <button type="submit" class="btn btn-primary-custom shadow-sm">
                                        Ubah Profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-center">
        &copy; 2026 Politeknik Negeri Cilacap
    </footer>

</body>

</html>