<?php
require_once __DIR__ . "/../../config/database.php";


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

// =======================
// AMBIL DATA FILE
// =======================
$result = mysqli_query($conn, "SELECT file_name FROM gallery WHERE id = $id");

if ($result && mysqli_num_rows($result) > 0) {

    $g = mysqli_fetch_assoc($result);
    $filePath = "../../uploads/" . $g['file_name'];

    // =======================
    // HAPUS FILE DARI FOLDER
    // =======================
    if (!empty($g['file_name']) && file_exists($filePath)) {
        unlink($filePath);
    }

    // =======================
    // HAPUS DATA DATABASE
    // =======================
    mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
}

// =======================
// REDIRECT
// =======================
header("Location: index.php");
exit;
