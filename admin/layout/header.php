<?php 
// ============================
// SESSION (AMAN)
// ============================
if (session_status() === PHP_SESSION_NONE) { 
    session_start();
}

// ============================
// CONFIG
// ============================
require_once __DIR__ . '/../../config/config.php';

// ============================
// CEK LOGIN
// ============================
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: " . BASE_URL . "auth/login.php");
    exit;
}

// ============================
// USER
// ============================
$username = $_SESSION['user']['username'] ?? 'Admin';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMP NEGERI 2 CIOMAS</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>css/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/halamanutama.css">
</head>

<body>

<!-- ============================
     NAVBAR
============================ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">

        <!-- BRAND -->
        <span class="navbar-brand fw-bold">🏫 Smart School</span>

        <!-- RIGHT MENU -->
        <div class="d-flex align-items-center gap-3">

            <!-- USER -->
            <div class="text-white d-flex align-items-center gap-2">
                <i class="bi bi-person-circle fs-5"></i>
                <span><?= htmlspecialchars($username) ?></span>
            </div>

            <!-- LOGOUT -->
            <a href="<?= BASE_URL ?>auth/logout.php" class="btn btn-sm btn-light">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>

        </div>
    </div>
</nav>

<!-- ============================
     WRAPPER
============================ -->
<div class="container-fluid">
    <div class="row">