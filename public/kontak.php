<?php 
require_once __DIR__ . '/../config/database.php';

if(isset($_POST['kirim'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

    $query = "INSERT INTO pesan_kontak (email, no_hp, pesan) 
              VALUES ('$email', '$no_hp', '$pesan')";

    if(mysqli_query($conn, $query)){
        header("Location: kontak.php?success=1");
        exit;
    } else {
        echo "Gagal kirim pesan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
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


<section class="hero-section">

    <!-- CAROUSEL -->
    <div id="heroCarousel"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-interval="1500">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="../asset/necid.jpg" class="hero-img" alt="">
            </div>

            <div class="carousel-item">
                <img src="../asset/luar sekolah.png" class="hero-img" alt="">
            </div>

            <div class="carousel-item">
                <img src="../asset/sekolah.png" class="hero-img" alt="">
            </div>

        </div>
    </div>


    <!-- overlay -->
    <div class="hero-overlay"></div>

    <!-- content -->
    <div class="hero-content">
        <h1>
            SMP NEGERI 2 CIOMAS <br>
            KABUPATEN BOGOR
        </h1>

        <p>
            Mewujudkan Generasi Berprestasi,
            Berkarakter, dan Berakhlak Mulia
        </p>
    </div>

</section>
   


    <!-- INFO + MAP -->
    <section class="container py-5" data-animate>
        <div class="row g-4 align-items-stretch">

            <!-- INFO KONTAK -->
            <div class="col-12 col-lg-5">
                <div class="card shadow-sm border-0 h-100" data-animate>
                    <div class="card-body p-4">

                        <h5 class="fw-bold text-primary mb-4">📞 Informasi Kontak</h5>

                        <div class="mb-3">
                            <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                            <strong>Alamat</strong>
                            <div class="text-muted small">
                                Jl. Raya Ciomas, Kabupaten Bogor, Jawa Barat
                            </div>
                        </div>

                        <div class="mb-3">
                            <i class="bi bi-telephone-fill text-warning me-2"></i>
                            <strong>Telepon</strong>
                            <div>
                                <a href="tel:02517559394" class="text-decoration-none">
                                    0251-7559394
                                </a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <i class="bi bi-envelope-fill text-warning me-2"></i>
                            <strong>Email</strong>
                            <div>
                                <a href="mailto:smpn2cms@ymail.com" class="text-decoration-none">
                                    smpn2cms@ymail.com
                                </a>
                            </div>
                        </div>

                        <div class="mb-4">
                            <i class="bi bi-clock-fill text-warning me-2"></i>
                            <strong>Jam Operasional</strong>
                            <div class="text-muted small">
                                Senin – Jumat, 07.00 – 15.00 WIB
                            </div>
                        </div>

                        <a href="https://www.google.com/maps?q=SMP+Negeri+2+Ciomas" target="_blank"
                            class="btn btn-primary w-100">
                            Lihat Lokasi di Maps
                        </a>

                    </div>
                </div>
            </div>

            <!-- MAP -->
            <div class="col-12 col-lg-7" data-animate>
                <div class="card shadow-sm border-0 h-100">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps?q=SMP+Negeri+2+Ciomas&output=embed" allowfullscreen
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FORM KONTAK -->
    <section class="container pb-5" data-animate>
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0" data-animate>
                    <div class="card-body p-4">

                        <h5 class="fw-bold text-primary mb-4 text-center">
                            💬 Kirim Pesan ke SMPN 2 Ciomas
                        </h5>

                        <?php if(isset($_GET['success'])) { ?>
                        <div class="alert alert-success text-center">
                            Pesan berhasil dikirim!
                        </div>
                        <?php } ?>

                        <form method="POST">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No HP</label>
                                    <input type="text" name="no_hp" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea name="pesan" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" name="kirim" class="btn btn-primary w-100">
                                Kirim Pesan
                            </button>

                        </form>

                    </div>
                </div>

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