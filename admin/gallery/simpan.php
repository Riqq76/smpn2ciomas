<?php
require_once __DIR__ . "/../../config/database.php";


// =====================
// CEK DATA WAJIB
// =====================
if (!isset($_POST['judul']) || !isset($_POST['tipe'])) {
    die("Data tidak lengkap");
}

$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$tipe  = $_POST['tipe'];

// =====================
// FOLDER TUJUAN UPLOAD
// =====================
$folder = "../../public/uploads/";
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// =====================
// PILIHAN IMAGE ATAU VIDEO
// =====================
if ($tipe === 'image') {

    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== 0) {
        die("Terjadi kesalahan saat upload file gambar");
    }

    $namaFile = $_FILES['file']['name'];
    $tmp      = $_FILES['file']['tmp_name'];
    $size     = $_FILES['file']['size'];

    // BATASI UKURAN (20MB)
    $maxSize = 20 * 1024 * 1024;
    if ($size > $maxSize) {
        die("Ukuran file terlalu besar! Maksimal 20MB.");
    }

    // VALIDASI EXTENSION
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $allowedImage = ['jpg', 'jpeg', 'png'];
    if (!in_array($ext, $allowedImage)) {
        die("Format gambar harus JPG atau PNG!");
    }

    // NAMA FILE BARU
    $namaBaru = time() . "_" . uniqid() . "." . $ext;

    if (!move_uploaded_file($tmp, $folder . $namaBaru)) {
        die("Gagal memindahkan file gambar");
    }

    // SIMPAN KE DATABASE
    $query = mysqli_query($conn, "
        INSERT INTO gallery (judul, tipe, file_name, video_link)
        VALUES ('$judul', 'image', '$namaBaru', NULL)
    ");

} elseif ($tipe === 'video') {

    if (!isset($_POST['video_link']) || empty($_POST['video_link'])) {
        die("URL video tidak boleh kosong");
    }

    $videoLink = mysqli_real_escape_string($conn, $_POST['video_link']);

   // SIMPAN KE DATABASE untuk video
$query = mysqli_query($conn, "
    INSERT INTO gallery (judul, tipe, file_name, video_link)
    VALUES ('$judul', 'video', '', '$videoLink')
");

} else {
    die("Tipe file tidak valid");
}

// =====================
// CEK QUERY
// =====================
if (!$query) {
    die("Gagal simpan ke database: " . mysqli_error($conn));
}

// =====================
// BERHASIL
// =====================
header("Location: index.php");
exit;