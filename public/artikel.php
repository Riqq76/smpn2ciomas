<?php
require_once __DIR__ . "/../config/database.php";

if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    header("Location: ../index.php");
    exit;
}

$slug = mysqli_real_escape_string($conn, $_GET['slug']);

$data = mysqli_query($conn, "
    SELECT * FROM artikel
    WHERE slug = '$slug'
    AND status = 'publish'
    LIMIT 1
");

$artikel = mysqli_fetch_assoc($data);

if (!$artikel) {
    echo "<h3 class='text-center mt-5'>Artikel tidak ditemukan</h3>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($artikel['judul']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">
    <div class="row justify-content-center">

        <!-- GRID DIPERSEMPIT -->
        <div class="col-12 col-md-10 col-lg-8 col-xl-7">

            <a href="../index.php" class="btn btn-secondary mb-3">← Kembali</a>

            <div class="card shadow-sm border-0">

                <?php if (!empty($artikel['gambar'])): ?>
                    <div class="text-center mt-3">
                        <img src="../admin/uploads/artikel/<?= htmlspecialchars($artikel['gambar']) ?>"
                             class="img-fluid rounded shadow-sm w-100"
                             style="max-width: 600px;">
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <h2 class="fw-bold text-center">
                        <?= htmlspecialchars($artikel['judul']) ?>
                    </h2>
                    <hr>
                    <p class="lh-lg">
                        <?= nl2br(htmlspecialchars($artikel['isi'])) ?>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
