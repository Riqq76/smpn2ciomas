<?php
require_once __DIR__ . "/config/database.php";

/* ===== ARTIKEL ===== */
$artikel = mysqli_query($conn, "
    SELECT judul, slug, gambar, isi
    FROM artikel
    WHERE status='publish'
    ORDER BY id DESC
    LIMIT 3
");




?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title> SMP Negeri 2 Ciomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Logo di Tab Browser -->
    <link rel="icon" type="image/png" href="asset/logo.png">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
</head>


<body>


    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-white" href="index.php">
                <img src="asset/logo.png" alt="Logo" width="40" height="40" class="me-2">
                SMPN 2 CIOMAS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Beranda</a>
                    </li>

                    <!-- Tentang -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Tentang kami
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="public/tentang/visi.php">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="public/tentang/profil.php">Profil</a></li>
                        </ul>
                    </li>

                    <!-- Akademik -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Akademik
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="public/akademik/kurikulum.php">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="public/akademik/mapel.php">Mata Pelajaran</a></li>
                            <li><a class="dropdown-item" href="public/akademik/penilaian.php">Penilaian</a></li>
                            <li><a class="dropdown-item" href="public/akademik/buku.php">Link Buku</a></li>
                        </ul>
                    </li>

                    <!-- Struktur -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Struktur
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="public/struktur/osis.php">OSIS</a></li>
                            <li><a class="dropdown-item" href="public/struktur/kesiswaan.php">Kesiswaan</a></li>
                            <li><a class="dropdown-item" href="public/struktur/guru.php">Staff & Guru</a></li>
                            <li><a class="dropdown-item" href="public/struktur/kepsek_tu.php">Kepsek & TU</a></li>
                        </ul>
                    </li>

                    <!-- Gallery -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Gallery
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item" href="public/gallery/foto.php">Foto</a></li>
                            <li><a class="dropdown-item" href="public/gallery/vidio.php">Video</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="public/kontak.php">Kontak</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="d-flex align-items-center text-white text-center "
        style="min-height:60vh; background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url('asset/necid.jpg') center/cover no-repeat;">

        <div class="container py-5">
            <h1 class="fw-bold display-6 display-md-4 mb-3" data-animate>
                SMP NEGERI 2 CIOMAS <br class="d-none d-md-block">
                KABUPATEN BOGOR
            </h1>

            <p class="lead mb-4" data-animate>
                Mewujudkan Generasi Berprestasi, Berkarakter, dan Berakhlak Mulia
            </p>


        </div>
    </section>



    <!-- sambutan kepala sekolah -->
    <div data-animate="fade-up">
        <section class="py-5 bg-light " data-animate=>
            <div class="container">
                <div class="row align-items-center g-4">

                    <div class="col-lg-6 text-center">
                        <img src="asset/kepala_sekolah.jpeg" class="img-fluid about-img">
                    </div>

                    <div class="col-lg-6" data-animate>
                        <h3 class="section-title">Sambutan Kepala Sekolah</h3>
                        <br>
                        <h4>Raden Body Supriyana, S.Pd</h4>
                        <p>SMP Negeri 2 Ciomas merupakan sekolah menengah pertama negeri yang berkomitmen
                            menyelenggarakan
                            pendidikan berkualitas dalam rangka mencetak peserta didik yang berprestasi, berkarakter,
                            serta
                            berakhlak mulia.

                            Dalam pelaksanaan kegiatan pembelajaran, SMP Negeri 2 Ciomas menerapkan sistem Smart School
                            yang
                            modern dan transparan sebagai upaya meningkatkan efektivitas, efisiensi, serta keterbukaan
                            dalam
                            pengelolaan pendidikan.</p>
                        <a href="public/tentang/profil.php" class="btn btn-primary mt-3">
                            Selengkapnya →
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>




    <!-- artikel -->
    <section class="py-5" data-animate>
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" data-animate>
                <h3 class="fw-bold">📰 Artikel Terbaru</h3>
                <a href="public/artikel.php" class="btn btn-outline-primary btn-sm">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                <?php while ($a = mysqli_fetch_assoc($artikel)): ?>
                <div class="col-md-6 col-lg-4" data-animate>
                    <div class="card h-100">

                        <?php if ($a['gambar']): ?>
                        <img src="admin/uploads/artikel/<?= htmlspecialchars($a['gambar']) ?>" class="card-img-top">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5><?= htmlspecialchars($a['judul']) ?></h5>
                            <p class="text-muted small"><?= substr(strip_tags($a['isi']),0,100) ?>...</p>
                        </div>

                        <div class="card-footer bg-white">
                            <a href="public/detail.php?slug=<?= $a['slug'] ?>" class="btn btn-outline-primary btn-sm">
                                Baca →
                            </a>
                        </div>

                    </div>
                </div>
                <?php endwhile; ?>
            </div>

        </div>
    </section>


    <!-- footer -->
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
                            <a href="index.php" class="text-decoration-none text-light">Beranda</a>
                        </li>
                        <li class="mb-2">
                            <a href="public/tentang/profil.php" class="text-decoration-none text-light">Profil</a>
                        </li>
                        <li class="mb-2">
                            <a href="public/artikel.php" class="text-decoration-none text-light">Artikel</a>
                        </li>
                        <li class="mb-2">
                            <a href="public/gallery/foto.php" class="text-decoration-none text-light">Gallery</a>
                        </li>
                        <li>
                            <a href="public/kontak.php" class="text-decoration-none text-light">Kontak</a>
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
    <script src="js/home.js"></script>
</body>

</html>