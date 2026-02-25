
<?php
require_once "../config/database.php";

if (!isset($_GET['slug'])) {
    header("Location: index.php");
    exit;
}

$slug = mysqli_real_escape_string($conn, $_GET['slug']);

$q = mysqli_query($conn, "
    SELECT * FROM artikel
    WHERE slug='$slug' AND status='publish'
");

$artikel = mysqli_fetch_assoc($q);

if (!$artikel) {
    echo "Artikel tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $artikel['judul'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-5">

    <a href="../index.php" class="btn btn-secondary mb-3">⬅️ Kembali</a>

    <h2 class="fw-bold"><?= htmlspecialchars($artikel['judul']) ?></h2>

    <?php if (!empty($artikel['gambar'])): ?>
        <img src="../admin/uploads/artikel/<?= $artikel['gambar'] ?>"
             class="img-fluid rounded my-3">
    <?php endif; ?>

    <div class="mt-3">
        <?= nl2br($artikel['isi']) ?>
    </div>

</div>

</body>
</html>
