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

/* ===== HAPUS KELAS (TANPA CEK SISWA) ===== */
mysqli_query($conn, "DELETE FROM kelas WHERE id = $id");

echo "
<script>
    alert('✅ Kelas berhasil dihapus');
    window.location='index.php';
</script>
";