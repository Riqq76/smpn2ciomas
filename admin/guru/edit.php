<?php
include __DIR__ . "/../../config/database.php";
include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "
    <script>
        alert('ID guru tidak ditemukan');
        window.location='index.php';
    </script>
    ";
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM guru WHERE id='$id'");
$g = mysqli_fetch_assoc($data);

if (!$g) {
    echo "
    <script>
        alert('Data guru tidak ditemukan');
        window.location='index.php';
    </script>
    ";
    exit;
}
?>

<h4 class="mb-3">✏️ Edit Data Guru</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $g['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <input type="text" name="nama" class="form-control"
                       value="<?= $g['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="<?= $g['email'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="<?= $g['no_hp'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">⬅️ Kembali</a>
                <button type="submit" class="btn btn-success">💾 Update</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
