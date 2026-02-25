<?php
require_once __DIR__ . "/../../config/auth_check.php";
require_once __DIR__ . "/../../config/database.php";

// ===== VALIDASI ID =====
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

// ===== HAPUS DATA =====
$stmt = $conn->prepare("DELETE FROM artikel WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// ===== KEMBALI =====
header("Location: index.php");
exit;
