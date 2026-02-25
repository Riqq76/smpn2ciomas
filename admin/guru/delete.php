<?php
include __DIR__ . "/../../config/database.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location='index.php';
    </script>
    ";
    exit;
}

// cek apakah guru masih jadi wali kelas
$cek = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM kelas WHERE wali_guru_id = '$id'"
);

$data = mysqli_fetch_assoc($cek);

if ($data['total'] > 0) {
    echo "
    <script>
        alert('❌ Guru tidak bisa dihapus karena masih menjadi wali kelas');
        window.location='index.php';
    </script>
    ";
    exit;
}

// aman untuk hapus
mysqli_query($conn, "DELETE FROM guru WHERE id='$id'");

echo "
<script>
    alert('✅ Data guru berhasil dihapus');
    window.location='index.php';
</script>
";
