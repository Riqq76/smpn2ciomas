<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔐 CEK LOGIN
require_once __DIR__ . '/../config/auth_check.php'; 

// DATABASE 
require_once __DIR__ . '/../config/database.php'; 

/* ======================
   FUNCTION HITUNG DATA
====================== */
function hitung($conn, $tabel) {
    $cek = mysqli_query($conn, "SHOW TABLES LIKE '$tabel'");
    if (mysqli_num_rows($cek) == 0) {
        return 0;
    }
    $q = mysqli_query($conn, "SELECT id FROM $tabel");
    return $q ? mysqli_num_rows($q) : 0;
}

/* ======================
   AMBIL DATA
====================== */
$kurikulum_query = mysqli_query($conn, "SELECT isi FROM kurikulum LIMIT 1"); 
$kurikulum = mysqli_fetch_assoc($kurikulum_query); 

/* ======================
   HITUNG DATA
====================== */
$guru       = hitung($conn, 'guru');
$kelas      = hitung($conn, 'kelas');
$artikel    = hitung($conn, 'artikel');
$gallery    = hitung($conn, 'gallery');
$akademik   = hitung($conn, 'akademik');
$kontak     = hitung($conn, 'pesan_kontak'); // ✅ FIX DISINI

$total_mapel     = hitung($conn, 'mata_pelajaran');
$total_penilaian = hitung($conn, 'penilaian');
$total_link      = hitung($conn, 'link_buku');
?>

<?php include __DIR__ . "/layout/header.php"; ?> 
<?php include __DIR__ . "/layout/sidebar.php"; ?>>

<div class="col-md-10 py-4">
    <h3 class="fw-bold mb-4 text-center">📊 Dashboard Sekolah</h3>

    <div class="row g-4">

        <!-- Guru -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-primary text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-chalkboard-teacher fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $guru ?></h4>
                    <p class="mb-0">Guru</p>
                </div>
            </div>
        </div>

        <!-- Kelas -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-info text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-school fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $kelas ?></h4>
                    <p class="mb-0">Kelas</p>
                </div>
            </div>
        </div>

        <!-- Artikel -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-success text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-newspaper fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $artikel ?></h4>
                    <p class="mb-0">Artikel</p>
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-warning text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-image fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $gallery ?></h4>
                    <p class="mb-0">Gallery</p>
                </div>
            </div>
        </div>



        <!-- Mata Pelajaran -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-danger text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-graduation-cap fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $total_mapel ?></h4>
                    <p class="mb-0">Mata Pelajaran</p>
                </div>
            </div>
        </div>



        <!-- Penilaian -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-secondary text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-file-pen fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $total_penilaian ?></h4>
                    <p class="mb-0">Penilaian</p>
                </div>
            </div>
        </div>

        <!-- Link Buku -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-dark text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-book fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $total_link ?></h4>
                    <p class="mb-0">Link Buku</p>
                </div>
            </div>
        </div>

        <!-- kontak_pesan -->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card text-white bg-info text-center shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="fa-solid fa-envelope fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-1"><?= $kontak ?></h4>
                    <p class="mb-0">Pesan Kontak</p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- CHART JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php include __DIR__ . "/layout/footer.php"; ?>