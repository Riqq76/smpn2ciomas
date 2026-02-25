<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔐 CEK LOGIN
require_once __DIR__ . '/../config/auth_check.php';

// DATABASE
require_once __DIR__ . '/../config/database.php';

// ==============================
// FUNCTION HITUNG DATA
// ==============================
function hitung($conn, $tabel) {
    $cek = mysqli_query($conn, "SHOW TABLES LIKE '$tabel'");
    if (mysqli_num_rows($cek) == 0) {
        return 0;
    }

    $q = mysqli_query($conn, "SELECT id FROM $tabel");
    return $q ? mysqli_num_rows($q) : 0;
}

// HITUNG DATA
$guru    = hitung($conn, 'guru');
$kelas   = hitung($conn, 'kelas');
$artikel = hitung($conn, 'artikel');
$gallery = hitung($conn, 'gallery');

// ==============================
// DATA GRAFIK 7 HARI TERAKHIR
// ==============================
$dataChart = [];
$labelChart = [];

for ($i = 6; $i >= 0; $i--) {
    $tanggal = date('Y-m-d', strtotime("-$i days"));

    $stmt = $conn->prepare("SELECT COUNT(DISTINCT ip_address) as total FROM visitors WHERE visit_date=?");
    $stmt->bind_param("s", $tanggal);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $labelChart[] = date('d M', strtotime($tanggal));
    $dataChart[] = $row['total'] ?? 0;
}
?>

<?php include __DIR__ . "/layout/header.php"; ?>
<?php include __DIR__ . "/layout/sidebar.php"; ?>

<style>
.dashboard-card {
    border-radius: 15px;
    transition: all 0.3s ease;
}
.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
.dashboard-icon {
    font-size: 35px;
}
</style>

<div class="col-md-10 p-4">

    <h3 class="fw-bold mb-4">Dashboard</h3>

    <!-- CARD -->
    <div class="row g-4">

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card bg-success text-white dashboard-card">
                <div class="card-body text-center">
                    <div class="dashboard-icon mb-2">
                        <i class="fa-solid fa-chalkboard-teacher"></i>
                    </div>
                    <h4><?= $guru ?></h4>
                    <p>Guru</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card bg-warning text-white dashboard-card">
                <div class="card-body text-center">
                    <div class="dashboard-icon mb-2">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <h4><?= $kelas ?></h4>
                    <p>Kelas</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card bg-info text-white dashboard-card">
                <div class="card-body text-center">
                    <div class="dashboard-icon mb-2">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <h4><?= $artikel ?></h4>
                    <p>Artikel</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card bg-danger text-white dashboard-card">
                <div class="card-body text-center">
                    <div class="dashboard-icon mb-2">
                        <i class="fa-solid fa-image"></i>
                    </div>
                    <h4><?= $gallery ?></h4>
                    <p>Gallery</p>
                </div>
            </div>
        </div>

    </div>

    <!-- GRAFIK -->
    <div class="card shadow mt-5">
        <div class="card-body">
            <h5 class="fw-bold mb-3">
                <i class="fa-solid fa-chart-line text-primary"></i>
                Statistik Pengunjung 7 Hari Terakhir
            </h5>
            <canvas id="visitorChart" height="100"></canvas>
        </div>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('visitorChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($labelChart); ?>,
        datasets: [{
            label: 'Jumlah Pengunjung',
            data: <?= json_encode($dataChart); ?>,
            borderWidth: 3,
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php include __DIR__ . "/layout/footer.php"; ?>
