<?php
include __DIR__ . "/../../config/database.php";

$id    = $_POST['id'] ?? null;
$nama  = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$no_hp = $_POST['no_hp'] ?? '';

if (!$id || !$nama) {
    echo "
    <script>
        alert('Data tidak lengkap');
        window.location='index.php';
    </script>
    ";
    exit;
}

mysqli_query($conn, "
    UPDATE guru SET
        nama  = '$nama',
        email = '$email',
        no_hp = '$no_hp'
    WHERE id = '$id'
");

header("Location: index.php");
exit;
