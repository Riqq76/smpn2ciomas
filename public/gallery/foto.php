<?php
require_once __DIR__ . "/../../config/database.php";

// pastikan koneksi ada
if (!isset($conn)) {
    die("Koneksi database tidak ditemukan");
}

// query data
$query = "SELECT * FROM gallery WHERE tipe='image' ORDER BY id DESC";
$data = mysqli_query($conn, $query);

// cek jika query error
if (!$data) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery Foto - SMPN 2 Ciomas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/gallery.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-white" href="../../index.php">
                <img src="../../asset/logo.png" alt="Logo" width="40" height="40" class="me-2">
                SMPN 2 CIOMAS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="../../index.php">Beranda</a>
                    </li>

                    <!-- Tentang -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Tentang kami
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="../tentang/visi.php">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="../tentang/profil.php">Profil</a></li>
                        </ul>
                    </li>

                    <!-- Akademik -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Akademik
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="../akademik/kurikulum.php">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="../akademik/mapel.php">Mata Pelajaran</a></li>
                            <li><a class="dropdown-item" href="../akademik/penilaian.php">Penilaian</a></li>
                            <li><a class="dropdown-item" href="../akademik/buku.php">Link Buku</a></li>
                        </ul>
                    </li>

                    <!-- Struktur -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Struktur
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="../struktur/osis.php">OSIS</a></li>
                            <li><a class="dropdown-item" href="../struktur/kesiswaan.php">Kesiswaan</a></li>
                            <li><a class="dropdown-item" href="../struktur/guru.php">Staff & Guru</a></li>
                            <li><a class="dropdown-item" href="../struktur/kepsek_tu.php">Kepsek & TU</a></li>
                        </ul>
                    </li>

                    <!-- Gallery -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Gallery
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="../gallery/foto.php">Foto</a></li>
                            <li><a class="dropdown-item" href="../gallery/vidio.php">Video</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="../kontak.php">Kontak</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- CONTENT -->

    <section class="container py-5">
        <div class="container" style="margin-top:100px;">

            <h3 class="text-center fw-bold mb-4">📸 Gallery Foto</h3>

            <div class="row g-4">
                <?php if(mysqli_num_rows($data) > 0): ?>
                <?php while($g = mysqli_fetch_assoc($data)): ?>
                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card shadow-sm h-100">
                        <img src="../uploads/<?= $g['file_name']; ?>" class="card-img-top"
                            style="height:200px; object-fit:cover;">

                        <div class="card-body text-center">
                            <small><?= $g['judul']; ?></small>
                        </div>
                    </div>

                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada foto
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <footer class="bg-dark text-light pt-5">
        <div class="container">

            <div class="row gy-5">

                <!-- BRAND & MAP -->
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">SMP NEGERI 2 CIOMAS</h5>

                    <p class="small text-secondary">
                        Sekolah yang berkomitmen mencetak generasi berprestasi,
                        berkarakter, dan berakhlak mulia melalui sistem Smart School.
                    </p>

                    <div class="ratio ratio-16x9 mt-3">
                        <iframe src="https://www.google.com/maps?q=SMP%20Negeri%202%20Ciomas&output=embed"
                            loading="lazy" allowfullscreen></iframe>
                    </div>
                </div>

                <!-- CONTACT -->
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Kontak</h6>

                    <ul class="list-unstyled small">
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2"></i> 0251-7559394
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2"></i> smpn2cms@ymail.com
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-geo-alt me-2"></i>
                            Jl. Raya Ciomas, Kab. Bogor
                        </li>
                    </ul>

                    <h6 class="fw-bold mt-4">Jam Operasional</h6>
                    <p class="small text-secondary mb-0">
                        Senin – Jumat <br> 07.00 – 14.00
                    </p>
                </div>

                <!-- MENU -->
                <div class="col-lg-2">
                    <h6 class="fw-bold mb-3">Menu</h6>

                    <ul class="list-unstyled small">
                        <li class="mb-2">
                            <a href="../../index.php" class="text-decoration-none text-light">Beranda</a>
                        </li>
                        <li class="mb-2">
                            <a href="../tentang/profil.php" class="text-decoration-none text-light">Profil</a>
                        </li>
                        <li class="mb-2">
                            <a href="../artikel.php" class="text-decoration-none text-light">Artikel</a>
                        </li>
                        <li class="mb-2">
                            <a href="foto.php" class="text-decoration-none text-light">Gallery</a>
                        </li>
                        <li>
                            <a href="../kontak.php" class="text-decoration-none text-light">Kontak</a>
                        </li>
                    </ul>
                </div>

                <!-- SOSIAL -->
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Ikuti Kami</h6>

                    <div class="d-flex gap-3 mt-3 fs-5">
                        <a href="https://www.youtube.com/@smpn2ciomas" class="text-light">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="https://www.instagram.com/smpn2ciomasbgr/" class="text-light">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- FOOTER BOTTOM -->
            <div class="border-top border-secondary mt-5 pt-4 pb-3 text-center small text-secondary">
                © <?= date('Y') ?> SMP Negeri 2 Ciomas — Smart School
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>