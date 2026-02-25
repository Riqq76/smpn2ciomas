<?php
include __DIR__ . "/../../config/database.php";
include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "
    <script>
        alert('ID kelas tidak ditemukan');
        window.location='index.php';
    </script>
    ";
    exit;
}

$kelas = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM kelas WHERE id='$id'")
);

if (!$kelas) {
    echo "
    <script>
        alert('Data kelas tidak ditemukan');
        window.location='index.php';
    </script>
    ";
    exit;
}

$guru = mysqli_query($conn, "SELECT * FROM guru");
?>

<h4 class="mb-3">✏️ Edit Kelas</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="post">

            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas"
                       value="<?= $kelas['nama_kelas'] ?>"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Wali Kelas</label>
                <select name="wali_guru_id" class="form-select">
                    <option value="">-- Pilih Guru --</option>
                    <?php while ($g = mysqli_fetch_assoc($guru)): ?>
                        <option value="<?= $g['id'] ?>"
                            <?= ($kelas['wali_guru_id'] == $g['id']) ? 'selected' : '' ?>>
                            <?= $g['nama'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">⬅️ Kembali</a>
                <button name="simpan" class="btn btn-primary">💾 Simpan</button>
            </div>

        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_kelas'];
    $wali = $_POST['wali_guru_id'] ?: null;

    if ($wali === null) {
        mysqli_query($conn, "
            UPDATE kelas SET
                nama_kelas = '$nama',
                wali_guru_id = NULL
            WHERE id = '$id'
        ");
    } else {
        mysqli_query($conn, "
            UPDATE kelas SET
                nama_kelas = '$nama',
                wali_guru_id = '$wali'
            WHERE id = '$id'
        ");
    }

    echo "
    <script>
        alert('✅ Data kelas berhasil diperbarui');
        window.location='index.php';
    </script>
    ";
}

include __DIR__ . "/../layout/footer.php";
?>
