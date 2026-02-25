<?php
require_once "../config/database.php";
$data = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery | SMPN 2 Ciomas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="/SMARTSCHOOL/css/gallery.css">

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
                    <li class="nav-item"><a class="nav-link active" href="../index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarAkademik" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akademik
                        </a>

                        <ul class="dropdown-menu shadow border-0" aria-labelledby="navbarAkademik">

                            <li>
                                <a class="dropdown-item" href="akademik/kurikulum.php">
                                    Kurikulum
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="akademik/mapel.php">
                                    Mata Pelajaran
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="akademik/penilaian.php">
                                    Penilaian
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="akademik/buku.php">
                                    Link Buku Pelajaran
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-warning btn-sm px-4" href="../auth/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- HERO HEADER -->
    <section class="hero text-white text-center d-flex align-items-center py-5" style="
            min-height:50vh;
            background:
                linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
                url('../asset/necid.jpg') center/cover no-repeat;
         ">
        <div class="container">

            <h1 class="fw-bold mb-3 fs-2 fs-md-1">
                Gallery SMP Negeri 2 Ciomas<br>
                KABUPATEN BOGOR
            </h1>



        </div>
    </section>

    <!-- GALLERY -->
    <section class="container py-5">
        <h3 class="gallery-title-header text-center mb-4">
            Gallery SMPN 2 Ciomas
        </h3>

        <div class="row g-4">
            <?php while($g = mysqli_fetch_assoc($data)): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="gallery-card position-relative overflow-hidden rounded shadow-sm">

                    <?php
                    $filePath = "../uploads/" . $g['file_name'];
                ?>

                    <?php if($g['tipe'] == 'image'): ?>
                    <img src="<?= htmlspecialchars($filePath) ?>" alt="<?= htmlspecialchars($g['judul']) ?>"
                        class="img-fluid w-100 gallery-media">
                    <?php else: ?>
                    <video class="w-100 gallery-media" muted>
                        <source src="<?= htmlspecialchars($filePath) ?>" type="video/mp4">
                    </video>
                    <?php endif; ?>

                    <div class="gallery-overlay d-flex align-items-center justify-content-center">
                        <div class="gallery-title text-white text-center px-2">
                            <?= htmlspecialchars($g['judul']) ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="footer-section">
        <div class="container py-5">
            <div class="row gy-4">

                <div class="col-lg-6">
                    <h5 class="footer-title">SMP NEGERI 2 CIOMAS</h5>
                    <div class="map-wrapper mt-3">
                        <iframe src="https://www.google.com/maps?q=SMP%20Negeri%202%20Ciomas&output=embed"
                            allowfullscreen></iframe>
                    </div>

                    <h6 class="footer-subtitle mt-4">Follow Us</h6>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h5 class="footer-title">Contact Us</h5>
                    <ul class="footer-contact mt-3 ps-0">
                        <li><i class="bi bi-telephone"></i> 08xxxxxxxxxx</li>
                        <li><i class="bi bi-envelope"></i> smpn2ciomas@gmail.com</li>
                        <li><i class="bi bi-geo-alt"></i> Jl. Raya Ciomas, Kabupaten Bogor</li>
                    </ul>

                    <h6 class="footer-subtitle mt-4">Opening Hour</h6>
                    <p>Senin – Jumat : 07.00 – 14.00</p>
                </div>

            </div>
        </div>

        <div class="footer-bottom text-center py-3">
            © <?= date('Y') ?> SMP Negeri 2 Ciomas | Smart School
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>