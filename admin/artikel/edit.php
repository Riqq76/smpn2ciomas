<?php
require_once __DIR__ . "/../../config/auth_check.php";
require_once __DIR__ . "/../../config/database.php";

// ===== CEK ID =====
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

// ===== AMBIL DATA ARTIKEL =====
$stmt = $conn->prepare("SELECT * FROM artikel WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$artikel = $result->fetch_assoc();
$stmt->close();

if (!$artikel) {
    header("Location: index.php");
    exit;
}

// ===== PROSES UPDATE =====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

    if (
        empty($_POST['judul']) ||
        empty($_POST['isi']) ||
        empty($_POST['status'])
    ) {
        echo "<script>
            alert('Semua field wajib diisi');
            history.back();
        </script>";
        exit;
    }

    $judul  = trim($_POST['judul']);
    $slug   = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $judul), '-'));
    $isi    = trim($_POST['isi']);
    $status = $_POST['status'];

    $gambar_lama = $artikel['gambar'];
    $gambar_baru = $gambar_lama;

    // ===== UPLOAD GAMBAR BARU =====
    $uploadDir = __DIR__ . "/../../uploads/artikel/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['gambar']['name'])) {

        $allowed = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $size = $_FILES['gambar']['size'];

        if (!in_array($ext, $allowed)) {
            echo "<script>alert('Format gambar tidak valid');history.back();</script>";
            exit;
        }

        if ($size > 2 * 1024 * 1024) {
            echo "<script>alert('Ukuran gambar maksimal 2MB');history.back();</script>";
            exit;
        }

        $gambar_baru = time() . '-' . uniqid() . '.' . $ext;

        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar_baru)) {
            echo "<script>alert('Upload gambar gagal');history.back();</script>";
            exit;
        }

        // hapus gambar lama
        if ($gambar_lama && file_exists($uploadDir . $gambar_lama)) {
            unlink($uploadDir . $gambar_lama);
        }
    }

    // ===== UPDATE DATABASE (AMAN) =====
    $stmt = $conn->prepare("
        UPDATE artikel SET
            judul = ?,
            slug = ?,
            isi = ?,
            gambar = ?,
            status = ?
        WHERE id = ?
    ");

    $stmt->bind_param(
        "sssssi",
        $judul,
        $slug,
        $isi,
        $gambar_baru,
        $status,
        $id
    );

    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>
            alert('✅ Artikel berhasil diperbarui');
            window.location='index.php';
        </script>";
        exit;
    } else {
        $stmt->close();
        echo "<script>alert('❌ Gagal update artikel');history.back();</script>";
        exit;
    }
}
?>

<?php include __DIR__ . "/../layout/header.php"; ?>
<?php include __DIR__ . "/../layout/sidebar.php"; ?>

<div class="container-fluid mt-4">
    <div class="col-md-10">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning">
                <h5 class="mb-0">✏️ Edit Artikel</h5>
            </div>

            <div class="card-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="judul"
                               class="form-control"
                               value="<?= htmlspecialchars($artikel['judul']) ?>"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">

                        <?php if ($artikel['gambar']): ?>
                            <div class="mt-2">
                                <img src="../../uploads/artikel/<?= htmlspecialchars($artikel['gambar']) ?>"
                                     width="180" class="rounded shadow-sm">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Isi</label>
                        <textarea name="isi" rows="6"
                                  class="form-control"
                                  required><?= htmlspecialchars($artikel['isi']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="publish" <?= $artikel['status']=='publish'?'selected':'' ?>>Publish</option>
                            <option value="draft" <?= $artikel['status']=='draft'?'selected':'' ?>>Draft</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">⬅️ Kembali</a>
                        <button type="submit" name="update" class="btn btn-warning">
                            💾 Update
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
