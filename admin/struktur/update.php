<?php
require_once "../../config/database.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$kategori = $_POST['kategori'];

if ($_FILES['foto']['name'] != "") {

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/" . $foto);

    mysqli_query($conn, "UPDATE struktur SET 
        nama='$nama',
        jabatan='$jabatan',
        kategori='$kategori',
        foto='$foto'
        WHERE id=$id
    ");

} else {

    mysqli_query($conn, "UPDATE struktur SET 
        nama='$nama',
        jabatan='$jabatan',
        kategori='$kategori'
        WHERE id=$id
    ");
}

header("Location: index.php");