<?php
require_once __DIR__ . '/../config/database.php';
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
    
    <link rel="stylesheet" href="../css/tentang.css">
</head>

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
                Tentang SMP Negeri 2 Ciomas<br>
                KABUPATEN BOGOR
            </h1>

            <p class="lead fs-6 fs-md-5">
                Profil, visi, dan misi SMP Negeri 2 Ciomas Kabupaten Bogor
            </p>



        </div>
    </section>

    <!-- KONTEN -->
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <!-- PROFIL -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-3 mb-md-0">
                                <img src="../asset/gedung.jpeg" class="profile-img shadow-sm"
                                    alt="Gedung SMP Negeri 2 Ciomas">

                            </div>
                            <div class="col-md-7">
                                <h4 class="mb-3">📘 Profil Sekolah</h4>
                                <p>
                                    <strong>SMP Negeri 2 Ciomas</strong> merupakan
                                    sekolah menengah pertama negeri yang berada
                                    di Kabupaten Bogor dan berkomitmen untuk
                                    menghadirkan layanan pendidikan yang
                                    berkualitas, inklusif, dan berorientasi pada
                                    pengembangan karakter peserta didik.
                                </p>
                                <p>
                                    Sekolah ini tidak hanya berfokus pada
                                    pencapaian akademik, tetapi juga pada
                                    pembentukan sikap disiplin, tanggung jawab,
                                    kepedulian sosial, serta penguatan nilai-nilai
                                    <strong>Pancasila</strong> dalam kehidupan
                                    sehari-hari siswa.
                                </p>
                                <p>
                                    Dengan dukungan tenaga pendidik dan tenaga
                                    kependidikan yang profesional, serta
                                    penerapan sistem <strong>Smart School</strong>,
                                    SMP Negeri 2 Ciomas terus berinovasi dalam
                                    menciptakan lingkungan belajar yang aman,
                                    nyaman, transparan, dan berbasis teknologi
                                    informasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VISI -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                
                                <h4 class="mb-3">🎯 Visi Sekolah</h4>
                                <p>
                                    Terwujudnya peserta didik SMP Negeri 2 Ciomas
                                    yang <strong>beriman dan bertakwa kepada Tuhan
                                        Yang Maha Esa</strong>, berakhlak mulia,
                                    berprestasi dalam bidang akademik dan
                                    non-akademik, berwawasan lingkungan, serta
                                    mampu beradaptasi dan bersaing secara positif
                                    di era global dan digital.
                                </p>
                                <p>
                                    Visi ini menjadi landasan utama dalam setiap
                                    kegiatan pembelajaran dan pengelolaan sekolah,
                                    guna menciptakan generasi muda yang cerdas,
                                    berkarakter, dan siap menghadapi tantangan
                                    masa depan.
                                </p>
                            </div>
                            <div class="col-md-5 mt-3 mt-md-0">
                                <img src="../asset/visi.png" class="img-fluid rounded shadow-sm"
                                    alt="Visi SMP Negeri 2 Ciomas">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MISI -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-3 mb-md-0">
                                <img src="../asset/logo.png" class="img-fluid rounded shadow-sm"
                                    alt="Misi SMP Negeri 2 Ciomas">
                            </div>
                            <div class="col-md-7">
                                <h4 class="mb-3">📌 Misi Sekolah</h4>
                                <ul class="mb-0">
                                    <li>
                                        Menyelenggarakan proses pembelajaran yang
                                        aktif, kreatif, efektif, dan menyenangkan
                                        berbasis kurikulum nasional.
                                    </li>
                                    <li>
                                        Menanamkan nilai keimanan, ketakwaan, dan
                                        akhlak mulia dalam setiap kegiatan sekolah.
                                    </li>
                                    <li>
                                        Mengembangkan potensi peserta didik di
                                        bidang akademik maupun non-akademik
                                        melalui kegiatan intrakurikuler dan
                                        ekstrakurikuler.
                                    </li>
                                    <li>
                                        Menciptakan lingkungan sekolah yang bersih,
                                        sehat, aman, dan ramah lingkungan.
                                    </li>
                                    <li>
                                        Menerapkan sistem <strong>Smart School</strong>
                                        untuk meningkatkan pelayanan informasi,
                                        transparansi, dan efektivitas pengelolaan
                                        sekolah.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                    <iframe
                        src="https://www.google.com/maps?q=SMP%20Negeri%202%20Ciomas&output=embed"
                        allowfullscreen=""
                        loading="lazy">
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