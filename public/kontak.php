<?php
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kontak | SMP Negeri 2 Ciomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/kontak.css">



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
                Untuk Informasi Lebih Lanjut HUBUNGI <br>SMP Negeri 2 Ciomas

            </h1>

            <p class="lead fs-6 fs-md-5">
                Profil, visi, dan misi SMP Negeri 2 Ciomas Kabupaten Bogor
            </p>



        </div>
    </section>

    <!-- KONTEN -->
    <section class="container py-5">
        <div class="row g-4">

            <!-- INFO KONTAK -->
            <div class="col-md-5">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h4 class="mb-3">📞 Informasi Kontak</h4>

                        <p>
                            <strong>📍 Alamat:</strong><br>
                            Jl. Raya Ciomas, Kabupaten Bogor, Jawa Barat
                        </p>

                        <p>
                            <strong>☎ Telepon:</strong><br>
                            (0251) 123456
                        </p>

                        <p>
                            <strong>✉ Email:</strong><br>
                            smpn2ciomas@gmail.com
                        </p>

                        <p>
                            <strong>⏰ Jam Operasional:</strong><br>
                            Senin – Jumat, 07.00 – 15.00 WIB
                        </p>
                    </div>
                </div>
            </div>

            <!-- MAPS -->
            <div class="col-md-7">
                <div class="card shadow-sm border-0 h-100 overflow-hidden">
                    <iframe src="https://www.google.com/maps?q=SMP+Negeri+2+Ciomas&output=embed" width="100%"
                        height="100%" style="border:0; min-height:350px;" allowfullscreen loading="lazy">
                    </iframe>
                </div>
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