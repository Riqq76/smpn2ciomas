<?php
require_once "../../config/database.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM struktur WHERE id=$id"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Struktur</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
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
        }
    </style>
</head>

<body>

<!-- 🔝 NAVBAR -->
<nav class="navbar navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">
            🏫 Admin Panel - Edit Struktur
        </span>
    </div>
</nav>

<!-- 📦 CONTENT -->
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-4">
                        <i class="bi bi-pencil-square"></i> Edit Data
                    </h4>

                    <!-- FOTO -->
                    <div class="text-center mb-4">
                        <img src="../uploads/<?= $data['foto']; ?>" id="preview" class="preview-img">
                    </div>

                    <form action="update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" required>
                        </div>

                        <!-- JABATAN -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jabatan</label>
                            <input type="text" name="jabatan" value="<?= $data['jabatan']; ?>" class="form-control" required>
                        </div>

                        <!-- KATEGORI -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="kategori" class="form-select">
                                <option value="osis" <?= $data['kategori']=='osis'?'selected':'' ?>>OSIS</option>
                                <option value="kesiswaan" <?= $data['kategori']=='kesiswaan'?'selected':'' ?>>Kesiswaan</option>
                                <option value="guru" <?= $data['kategori']=='guru'?'selected':'' ?>>Staff & Guru</option>
                                <option value="kepsek_tu" <?= $data['kategori']=='kepsek_tu'?'selected':'' ?>>Kepsek & TU</option>
                            </select>
                        </div>

                        <!-- FOTO -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Ganti Foto</label>
                            <input type="file" name="foto" class="form-control" onchange="previewImage(event)">
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>

                            <button class="btn btn-success px-4">
                                <i class="bi bi-save"></i> Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- JS Preview -->
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>