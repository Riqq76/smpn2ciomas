<?php
require_once __DIR__ . "/../../config/database.php";


$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$kategori = $_POST['kategori'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "../uploads/" . $foto);

mysqli_query($conn, "INSERT INTO struktur (nama, jabatan, kategori, foto)
VALUES ('$nama','$jabatan','$kategori','$foto')");

header("Location: index.php");