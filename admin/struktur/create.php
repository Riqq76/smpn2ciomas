<?php include "../layout/header.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Struktur</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 15px;
        }

        .preview-img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dee2e6;
            display: none;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-4">
                        <i class="bi bi-plus-circle"></i> Tambah Struktur
                    </h4>

                    <!-- Preview Foto -->
                    <div class="text-center mb-4">
                        <img id="preview" class="preview-img">
                    </div>

                    <form action="store.php" method="POST" enctype="multipart/form-data">

                        <!-- Nama -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                        </div>

                        <!-- Jabatan -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Masukkan jabatan" required>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="osis">OSIS</option>
                                <option value="kesiswaan">Kesiswaan</option>
                                <option value="guru">Staff & Guru</option>
                                <option value="kepsek_tu">Kepsek & TU</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Upload Foto</label>
                            <input type="file" name="foto" class="form-control" required onchange="previewImage(event)">
                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>

                            <button class="btn btn-primary px-4">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- Preview Image -->
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const reader = new FileReader();

    reader.onload = function(){
        preview.src = reader.result;
        preview.style.display = "block";
    }

    reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>