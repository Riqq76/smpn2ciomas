<?php
include __DIR__ . "/../../config/database.php";
include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

$guru = mysqli_query($conn, "SELECT * FROM guru");
?>

<h4 class="mb-3">➕ Tambah Kelas</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="store.php" method="post">

            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control"
                       placeholder="Contoh: VII A" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Wali Kelas</label>
                <select name="wali_guru_id" class="form-select">
                    <option value="">-- Pilih Wali Kelas --</option>
                    <?php while ($g = mysqli_fetch_assoc($guru)): ?>
                        <option value="<?= $g['id'] ?>">
                            <?= $g['nama'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">⬅️ Kembali</a>
                <button type="submit" class="btn btn-primary">💾 Simpan</button>
            </div>

        </form>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
