<?php 
require_once "../config/database.php"; 

if(!isset($_GET['slug']) || $_GET['slug'] == '') { 
    echo "Slug tidak ditemukan."; 
    exit; 
}

$slug = mysqli_real_escape_string($conn, $_GET['slug']);
$query = mysqli_query($conn, "SELECT * FROM artikel WHERE slug='$slug'");

if(!$query){
    die("Query error: " . mysqli_error($conn));
}

if(mysqli_num_rows($query) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($query);
?>

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

    <!-- HEADER -->
    <div class="bg-primary text-white text-center py-5" data-animate>
        <div class="container">
            <h2 class="fw-bold mb-0">
                <?= htmlspecialchars($data['judul']) ?>
            </h2>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container py-4 py-md-5">
        <div class="row justify-content-center">

            <div class="col-12 col-md-10 col-lg-8">

                <div class="card shadow border-0" data-animate>

                    <!-- GAMBAR -->
                    <?php 
                $path = "../admin/uploads/artikel/" . $data['gambar'];
                if(!empty($data['gambar']) && file_exists($path)): 
                ?>
                    <div class="ratio ratio-16x9">
                        <img src="<?= $path ?>" class="card-img-top object-fit-cover">
                    </div>
                    <?php else: ?>
                    <div class="ratio ratio-16x9">
                        <img src="https://via.placeholder.com/800x400" class="card-img-top object-fit-cover">
                    </div>
                    <?php endif; ?>

                    <!-- BODY -->
                    <div class="card-body p-3 p-md-4">

                        <!-- META -->
                        <?php if(isset($data['tanggal'])): ?>
                        <p class="text-muted small mb-3" data-animate>
                            📅 <?= date('d M Y', strtotime($data['tanggal'])) ?>
                        </p>
                        <?php endif; ?>

                        <!-- ISI -->
                        <div class="mb-4 text-justify" data-animate>
                            <?= nl2br(htmlspecialchars($data['isi'])) ?>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-between" data-animate>
                            <a href="artikel.php" class="btn btn-outline-primary btn-sm">
                                ← Artikel
                            </a>

                            <a href="../index.php" class="btn btn-primary btn-sm">
                                🏠 Beranda
                            </a>
                        </div>

                    </div>
                </div>

            </div>

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