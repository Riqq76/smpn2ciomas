<?php
require_once __DIR__ . "/../../config/auth_check.php";
require_once __DIR__ . "/../../config/database.php";

include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";
?>

<div class="col-md-10 p-4">
    <h4>Tambah Artikel</h4>

    <form action="store.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft">Draft</option>
                <option value="publish">Publish</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">
            Simpan
        </button>

        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
