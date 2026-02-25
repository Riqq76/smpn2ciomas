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

/* ===== GALLERY ===== */
$gallery = mysqli_query($conn, "
    SELECT judul, file_name, tipe
    FROM gallery 
    ORDER BY id DESC 
    LIMIT 6
");


?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tentang Sekolah | SMP Negeri 2 Ciomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
</head>


<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">SMPN 2 CIOMAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="public/tentang.php">Tentang</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarAkademik" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akademik
                        </a>

                        <ul class="dropdown-menu shadow border-0" aria-labelledby="navbarAkademik">

                            <li>
                                <a class="dropdown-item" href="public/akademik/kurikulum.php">
                                    Kurikulum
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="public/akademik/mapel.php">
                                    Mata Pelajaran
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="public/akademik/penilaian.php">
                                    Penilaian
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="public/akademik/buku.php">
                                    Link Buku Pelajaran
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="public/gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="public/kontak.php">Kontak</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-warning btn-sm px-4" href="auth/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- HERO -->
    <section class="hero text-white d-flex align-items-center text-center">
        <div class="container">
            <h1 class="fw-bold display-5 mb-3">
                SMP NEGERI 2 CIOMAS<br>
                KABUPATEN BOGOR
            </h1>

            <p class="hero-tagline mb-4">
                Mewujudkan Generasi Berprestasi, Berkarakter, dan Berakhlak Mulia
            </p>

            <a href="public/tentang.php" class="btn btn-warning px-4">
                Tentang Kami
            </a>
        </div>
    </section>




    <!-- ABOUT US -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 text-center">
                    <img src="asset/kepala_sekolah.jpeg" class="img-fluid about-img">
                </div>
                <div class="col-lg-6">
                    <h3 class="section-title">Sambutan Kepala Sekolah</h3>
                    <br>
                    <h4>Raden Body Supriyana, S.Pd</h4>
                    <p>
                        SMP Negeri 2 Ciomas merupakan sekolah menengah pertama negeri yang berkomitmen menyelenggarakan
                        pendidikan berkualitas dalam rangka mencetak peserta didik yang berprestasi, berkarakter, serta
                        berakhlak mulia.

                        Dalam pelaksanaan kegiatan pembelajaran, SMP Negeri 2 Ciomas menerapkan sistem Smart School yang
                        modern dan transparan sebagai upaya meningkatkan efektivitas, efisiensi, serta keterbukaan dalam
                        pengelolaan pendidikan.
                    </p>
                    <a href="public/tentang.php" class="btn btn-primary mt-3">
                        Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- GALLERY -->
    <section class="py-5 bg-light">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <h3 class="fw-bold">📸 Gallery Sekolah</h3>
                <a href="public/gallery.php" class="btn btn-outline-primary btn-sm">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                <?php while ($g = mysqli_fetch_assoc($gallery)): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">

                        <?php $filePath = "uploads/" . $g['file_name']; ?>

                        <?php if ($g['tipe'] == 'image'): ?>
                        <img src="<?= htmlspecialchars($filePath) ?>" class="card-img-top"
                            style="height:220px; object-fit:cover;" alt="<?= htmlspecialchars($g['judul']) ?>">
                        <?php else: ?>
                        <video class="card-img-top" style="height:220px; object-fit:cover;" muted>
                            <source src="<?= htmlspecialchars($filePath) ?>" type="video/mp4">
                        </video>
                        <?php endif; ?>

                        <div class="card-body text-center p-2">
                            <small class="fw-semibold">
                                <?= htmlspecialchars($g['judul']) ?>
                            </small>
                        </div>

                    </div>
                </div>
                <?php endwhile; ?>
            </div>

        </div>
    </section>



    <!-- ARTIKEL -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <h3 class="fw-bold">📰 Artikel Terbaru</h3>
                <a href="public/artikel.php" class="btn btn-outline-primary btn-sm">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                <?php while ($a = mysqli_fetch_assoc($artikel)): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <?php if ($a['gambar']): ?>
                        <img src="admin/uploads/artikel/<?= htmlspecialchars($a['gambar']) ?>" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5><?= htmlspecialchars($a['judul']) ?></h5>
                            <p class="text-muted small"><?= substr(strip_tags($a['isi']),0,100) ?>...</p>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="public/artikel.php?slug=<?= $a['slug'] ?>" class="btn btn-outline-primary btn-sm">
                                Baca →
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>


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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>