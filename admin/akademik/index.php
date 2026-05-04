<?php
session_start();
require_once __DIR__ . "/../../config/database.php";



/* ======================
   AMBIL DATA
====================== */

$kurikulum_query = mysqli_query($conn, "SELECT isi FROM kurikulum LIMIT 1");
$kurikulum = mysqli_fetch_assoc($kurikulum_query);

$total_mapel = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM mata_pelajaran")
);

$total_penilaian = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM penilaian")
);

$total_link = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM link_buku")
);
?>

<?php include "../layout/header.php"; ?>
<?php include "../layout/sidebar.php"; ?>

<div class="container-fluid">

    <!-- PAGE TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">📚 Dashboard Akademik</h4>
        <span class="text-muted small">Panel Manajemen Akademik</span>
    </div>

    <!-- STATISTIC CARDS -->
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="fw-bold text-primary"><?= $total_mapel ?></h2>
                    <p class="mb-0 text-muted">Total Mata Pelajaran</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="fw-bold text-success"><?= $total_penilaian ?></h2>
                    <p class="mb-0 text-muted">Total Penilaian</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="fw-bold text-warning"><?= $total_link ?></h2>
                    <p class="mb-0 text-muted">Total Link Buku</p>
                </div>
            </div>
        </div>

    </div>

    <!-- CONTENT ROW -->
    <div class="row g-4">

        <!-- PREVIEW KURIKULUM -->
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0 fw-semibold">Preview Kurikulum</h5>
                </div>

                <div class="card-body">

                    <?php if($kurikulum && !empty($kurikulum['isi'])): ?>
                        <p class="text-muted" style="line-height:1.7;">
                            <?= nl2br(htmlspecialchars(substr($kurikulum['isi'],0,500))) ?>...
                        </p>
                    <?php else: ?>
                        <p class="text-muted">
                            Belum ada data kurikulum yang tersedia.
                        </p>
                    <?php endif; ?>

                    <a href="kurikulum.php" class="btn btn-primary btn-sm mt-2">
                        Kelola Kurikulum
                    </a>

                </div>
            </div>
        </div>

        <!-- QUICK MENU -->
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0 fw-semibold">Menu Cepat</h5>
                </div>

                <div class="list-group list-group-flush">

                    <a href="mapel.php"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Mata Pelajaran
                        <span class="badge bg-primary rounded-pill"><?= $total_mapel ?></span>
                    </a>

                    <a href="penilaian.php"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Penilaian
                        <span class="badge bg-success rounded-pill"><?= $total_penilaian ?></span>
                    </a>

                    <a href="link_buku.php"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Link Buku
                        <span class="badge bg-warning text-dark rounded-pill"><?= $total_link ?></span>
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

<?php include "../layout/footer.php"; ?>
