<!DOCTYPE html>
<html>
<head>
    <title>Tambah Progress</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-warning">

            <h4>Tambah Progress MBKM</h4>

        </div>

        <div class="card-body">

            <form action="/simpan-progress" method="POST">

                @csrf

                <input
                    type="hidden"
                    name="aktivitas_id"
                    value="{{ $aktivitas_id }}">

                <div class="mb-3">

                    <label class="form-label">

                        Bulan

                    </label>

                    <input
                        type="text"
                        name="bulan"
                        class="form-control"
                        placeholder="Contoh: Juni 2026"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Progress

                    </label>

                    <textarea
                        name="progress"
                        class="form-control"
                        rows="5"
                        required></textarea>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

                    Simpan

                </button>

                <a href="/aktivitas"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>