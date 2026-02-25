<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card border-0 shadow rounded-4">
                
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">Tambah Gallery (Foto / Video)</h5>
                </div>

                <div class="card-body p-4">

                    <form action="simpan.php" method="POST" enctype="multipart/form-data">

                        <!-- Judul -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Judul
                            </label>
                            <input type="text"
                                   name="judul"
                                   class="form-control"
                                   placeholder="Masukkan judul"
                                   required>
                        </div>

                        <!-- Pilih Tipe -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Tipe File
                            </label>
                            <select name="tipe" class="form-select" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="image">Foto</option>
                                <option value="video">Video</option>
                            </select>
                        </div>

                        <!-- Upload -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Upload File
                            </label>
                            <input type="file"
                                   name="file"
                                   class="form-control"
                                   required>
                            <div class="form-text">
                                Foto: JPG, PNG <br>
                                Video: MP4, WEBM <br>
                                Max 20MB
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="index.php" class="btn btn-outline-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
