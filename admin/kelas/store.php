<?php
include __DIR__ . "/../../config/database.php";

$nama = $_POST['nama_kelas'] ?? '';
$wali = $_POST['wali_guru_id'] ?? '';

if (!$nama) {
    echo "
    <script>
        alert('Nama kelas wajib diisi');
        window.location='create.php';
    </script>
    ";
    exit;
}

if ($wali === '') {
    // jika tidak memilih wali kelas
    mysqli_query($conn, "
        INSERT INTO kelas (nama_kelas, wali_guru_id)
        VALUES ('$nama', NULL)
    ");
} else {
    mysqli_query($conn, "
        INSERT INTO kelas (nama_kelas, wali_guru_id)
        VALUES ('$nama', '$wali')
    ");
}

header("Location: index.php");
exit;
