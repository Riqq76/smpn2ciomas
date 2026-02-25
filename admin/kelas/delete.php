<?php
include __DIR__ . "/../../config/database.php";

$id = $_GET['id'] ?? null;

/* ===== VALIDASI ID ===== */
if (!$id || !is_numeric($id)) {
    echo "
    <script>
        alert('ID kelas tidak valid');
        window.location='index.php';
    </script>
    ";
    exit;
}

/* ===== CEK SISWA ===== */
$cekSiswa = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM siswa WHERE kelas_id = $id"
    )
);

if ($cekSiswa['total'] > 0) {
    echo "
    <script>
        alert('❌ Kelas tidak bisa dihapus karena masih memiliki siswa');
        window.location='index.php';
    </script>
    ";
    exit;
}

/* ===== HAPUS KELAS ===== */
mysqli_query($conn, "DELETE FROM kelas WHERE id = $id");

echo "
<script>
    alert('✅ Kelas berhasil dihapus');
    window.location='index.php';
</script>
";
