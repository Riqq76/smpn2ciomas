<?php
require_once "../config/database.php";

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

if($search != ''){
    $query = "SELECT * FROM artikel 
              WHERE judul LIKE '%$search%' 
              OR isi LIKE '%$search%' 
              ORDER BY id DESC";
} else {
    $query = "SELECT * FROM artikel ORDER BY id DESC";
}

$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<<head>
    <meta charset="UTF-8">
    <title> SMP Negeri 2 Ciomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Logo di Tab Browser -->
    <link rel="icon" type="image/png" href="../asset/logo.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/kontak.css">

    </head>

    <body>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center fw-bold text-white" href="../index.php">
                    <img src="../asset/logo.png" alt="Logo" width="40" height="40" class="me-2">
                    SMPN 2 CIOMAS
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="../index.php">Beranda</a>
                        </li>

                        <!-- Tentang -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                                Tentang kami
                            </a>
                            <ul class="dropdown-menu custom-dropdown">
                                <li><a class="dropdown-item" href="tentang/visi.php">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="tentang/profil.php">Profil</a></li>
                            </ul>
                        </li>

                        <!-- Akademik -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                                Akademik
                            </a>
                            <ul class="dropdown-menu custom-dropdown">
                                <li><a class="dropdown-item" href="akademik/kurikulum.php">Kurikulum</a></li>
                                <li><a class="dropdown-item" href="akademik/mapel.php">Mata Pelajaran</a></li>
                                <li><a class="dropdown-item" href="akademik/penilaian.php">Penilaian</a></li>
                                <li><a class="dropdown-item" href="akademik/buku.php">Link Buku</a></li>
                            </ul>
                        </li>

                        <!-- Struktur -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                                Struktur
                            </a>
                            <ul class="dropdown-menu custom-dropdown">
                                <li><a class="dropdown-item" href="struktur/osis.php">OSIS</a></li>
                                <li><a class="dropdown-item" href="struktur/kesiswaan.php">Kesiswaan</a></li>
                                <li><a class="dropdown-item" href="struktur/guru.php">Staff & Guru</a></li>
                                <li><a class="dropdown-item" href="struktur/kepsek_tu.php">Kepsek & TU</a></li>
                            </ul>
                        </li>

                        <!-- Gallery -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                                Gallery
                            </a>
                            <ul class="dropdown-menu custom-dropdown">
                                <li><a class="dropdown-item" href="gallery/foto.php">Foto</a></li>
                                <li><a class="dropdown-item" href="gallery/vidio.php">Video</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="kontak.php">Kontak</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- HERO HEADER -->
        <section class="d-flex align-items-center text-white text-center"
            style="min-height:50vh; background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url('../asset/necid.jpg') center/cover no-repeat;">

            <div class="container py-5">
                <h1 class="fw-bold display-6 display-md-4 mb-3" data-animate>
                    Kumpulan Artikel <br class="d-none d-md-block">
                    SMP Negeri 2 Ciomas
                </h1>

                <p class="lead mb-0 " data-animate>
                    SMP Negeri 2 Ciomas Kabupaten Bogor
                </p>
            </div>
        </section>



        <div class="container py-4 py-md-5">
            <!-- HEADER -->
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-md-center mb-4 gap-3"
                data-animate>
                <h2 class="fw-bold mb-0">Semua Artikel</h2>
            </div>

            <!-- SEARCH -->
            <form method="GET" class="mb-4" data-animate>
                <div class="input-group">

                    <input type="text" name="search" class="form-control" placeholder="Cari artikel..."
                        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

                    <button class="btn btn-primary" type="submit">
                        🔍 Cari
                    </button>

                    <?php if(isset($_GET['search']) && $_GET['search'] != ''): ?>
                    <a href="artikel.php" class="btn btn-outline-secondary">
                        Reset
                    </a>
                    <?php endif; ?>

                </div>
            </form>

            <?php if(isset($_GET['search']) && $_GET['search'] != ''): ?>
            <p class="text-muted small" data-animate>
                Hasil pencarian untuk: <b><?= htmlspecialchars($_GET['search']) ?></b>
            </p>
            <?php endif; ?>

            <!-- LIST ARTIKEL -->
            <div class="row g-4">

                <?php if(mysqli_num_rows($data) > 0): ?>
                <?php while($artikel = mysqli_fetch_assoc($data)): ?>

                <div class="col-12 col-md-6 col-lg-4" data-animate>

                    <div class="card h-100 border-0 shadow-sm">

                        <!-- GAMBAR -->
                        <?php 
                $path = "../admin/uploads/artikel/" . $artikel['gambar'];
                if(!empty($artikel['gambar']) && file_exists($path)): 
                ?>
                        <div class="ratio ratio-4x3">
                            <img src="<?= $path ?>" class="card-img-top object-fit-cover">
                        </div>
                        <?php else: ?>
                        <div class="ratio ratio-4x3">
                            <img src="https://via.placeholder.com/400x250" class="card-img-top object-fit-cover">
                        </div>
                        <?php endif; ?>

                        <!-- BODY -->
                        <div class="card-body d-flex flex-column">

                            <!-- JUDUL -->
                            <h5 class="card-title fw-semibold" data-animate>
                                <?= htmlspecialchars($artikel['judul']) ?>
                            </h5>

                            <!-- ISI -->
                            <p class="card-text text-muted small" data-animate>
                                <?= htmlspecialchars(substr($artikel['isi'], 0, 100)) ?>...
                            </p>

                            <!-- BUTTON -->
                            <div class="mt-auto d-flex justify-content-between align-items-center" data-animate>
                                <a href="detail.php?slug=<?= htmlspecialchars($artikel['slug']) ?>"
                                    class="btn btn-primary btn-sm">
                                    Baca
                                </a>

                                <span class="text-muted small">→</span>
                            </div>

                        </div>
                    </div>

                </div>

                <?php endwhile; ?>

                <?php else: ?>

                <!-- EMPTY STATE -->
                <div class="col-12">
                    <div class="text-center py-5" data-animate>
                        <h5 class="text-muted">Belum ada artikel</h5>
                        <p class="text-muted small">Silakan cek kembali nanti</p>
                    </div>
                </div>

                <?php endif; ?>

            </div>
        </div>
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
                                <a href="../index.php" class="text-decoration-none text-light">Beranda</a>
                            </li>
                            <li class="mb-2">
                                <a href="tentang/profil.php" class="text-decoration-none text-light">Profil</a>
                            </li>
                            <li class="mb-2">
                                <a href="artikel.php" class="text-decoration-none text-light">Artikel</a>
                            </li>
                            <li class="mb-2">
                                <a href="gallery/foto.php" class="text-decoration-none text-light">Gallery</a>
                            </li>
                            <li>
                                <a href="kontak.php" class="text-decoration-none text-light">Kontak</a>
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
        <script src="../js/animasi.js"></script>

    </body>

</html>