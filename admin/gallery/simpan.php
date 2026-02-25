<?php
require_once "../../config/database.php";

// =====================
// CEK DATA WAJIB
// =====================
if (!isset($_POST['judul']) || !isset($_POST['tipe']) || !isset($_FILES['file'])) {
    die("Data tidak lengkap");
}

$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$tipe  = $_POST['tipe'];

// =====================
// CEK ERROR UPLOAD
// =====================
if ($_FILES['file']['error'] !== 0) {
    die("Terjadi kesalahan saat upload file");
}

$namaFile = $_FILES['file']['name'];
$tmp      = $_FILES['file']['tmp_name'];
$size     = $_FILES['file']['size'];

// =====================
// BATASI UKURAN (20MB)
// =====================
$maxSize = 20 * 1024 * 1024;
if ($size > $maxSize) {
    die("Ukuran file terlalu besar! Maksimal 20MB.");
}

// =====================
// VALIDASI EXTENSION
// =====================
$ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

$allowedImage = ['jpg', 'jpeg', 'png'];
$allowedVideo = ['mp4', 'webm', 'mov'];

if ($tipe == "image" && !in_array($ext, $allowedImage)) {
    die("Format gambar harus JPG atau PNG!");
}

if ($tipe == "video" && !in_array($ext, $allowedVideo)) {
    die("Format video harus MP4, WEBM, atau MOV!");
}

// =====================
// FOLDER TUJUAN
// =====================
$folder = "../../uploads/";

// CEK FOLDER
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// =====================
// AMANKAN NAMA FILE
// =====================
$namaBaru = time() . "_" . uniqid() . "." . $ext;

// PINDAHKAN FILE
if (!move_uploaded_file($tmp, $folder . $namaBaru)) {
    die("Gagal memindahkan file");
}

// =====================
// SIMPAN KE DATABASE
// =====================
$query = mysqli_query($conn, "
    INSERT INTO gallery (judul, tipe, file_name)
    VALUES ('$judul', '$tipe', '$namaBaru')
");

if (!$query) {
    die("Gagal simpan ke database: " . mysqli_error($conn));
}

// =====================
// BERHASIL
// =====================
header("Location: index.php");
exit;
