<?php
include "../../config/database.php";

$keyword = "";

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM link_buku WHERE judul LIKE ? ORDER BY id DESC");
    $like = "%".$keyword."%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $data = $stmt->get_result();
} else {
    $data = mysqli_query($conn, "SELECT * FROM link_buku ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Buku & Referensi - SMPN 2 CIOMAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/buku.css">
</head>

<body>
   <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../../index.php">SMPN 2 CIOMAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="../../index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="../tentang.php">Tentang</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">
                        Akademik
                    </a>
                    <ul class="dropdown-menu shadow border-0">
                        <li><a class="dropdown-item" href="kurikulum.php">Kurikulum</a></li>
                        <li><a class="dropdown-item" href="mapel.php">Mata Pelajaran</a></li>
                        <li><a class="dropdown-item" href="penilaian.php">Penilaian</a></li>
                        <li><a class="dropdown-item" href="buku.php">Link Buku</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="../gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="../kontak.php">Kontak</a></li>

                <li class="nav-item ms-lg-3">
                    <a class="btn btn-warning btn-sm px-4" href="../../auth/login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- CONTENT -->
    <div class="container py-5">

        <h2 class="fw-bold mb-5 text-center">📖 Buku & Referensi</h2>
        <form method="GET" class="mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group shadow-sm">
                        <input type="text" name="search" class="form-control" placeholder="Cari judul buku..."
                            value="<?= htmlspecialchars($keyword) ?>">
                        <button class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <?php if(mysqli_num_rows($data) > 0): ?>
            <?php while($d = mysqli_fetch_assoc($data)): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <?= htmlspecialchars($d['judul']) ?>
                        </h5>

                        <a href="<?= htmlspecialchars($d['url']) ?>" target="_blank" class="btn btn-primary btn-sm">
                            🔗 Lihat Buku
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada buku tersedia.</p>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="../../index.php" class="btn btn-outline-secondary">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>

    <footer class="footer-section">
        <div class="container py-5">
            <div class="row gy-4">

                <!-- MAP & NAMA SEKOLAH -->
                <div class="col-lg-6">
                    <h5 class="footer-title">SMP NEGERI 2 CIOMAS</h5>

                    <div class="map-wrapper mt-3">
                        <iframe src="https://www.google.com/maps?q=SMP%20Negeri%202%20Ciomas&output=embed"
                            allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>

                    <h6 class="mt-4 footer-subtitle">Follow Us</h6>
                    <div class="footer-social">
                        <a href="https://www.youtube.com/@smpn2ciomas"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.instagram.com/smpn2ciomasbgr/"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <!-- KONTAK -->
                <div class="col-lg-6">
                    <h5 class="footer-title">Contact Us</h5>

                    <ul class="footer-contact mt-3">
                        <li><i class="bi bi-telephone"></i> 08xxxxxxxxxx</li>
                        <li><i class="bi bi-envelope"></i> smpn2ciomas@gmail.com</li>
                        <li><i class="bi bi-geo-alt"></i>
                            Jl. Raya Ciomas, Kabupaten Bogor, Jawa Barat
                        </li>
                    </ul>

                    <h6 class="footer-subtitle mt-4">Opening Hour</h6>
                    <p>Senin – Jumat : 07.00 – 14.00</p>
                </div>

            </div>
        </div>

        <!-- COPYRIGHT -->
        <div class="footer-bottom text-center py-3">
            © <?= date('Y') ?> SMP Negeri 2 Ciomas | Smart School
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>