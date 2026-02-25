<?php
// WAJIB: session_start hanya sekali
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PATH BENAR: layout → admin → smartschool → config
require_once __DIR__ . '/../../config/config.php';

// CEK LOGIN
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: " . BASE_URL . "auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>SMP NEGERI 2 CIOMAS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <!-- CSS PROJECT -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/halamanutama.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">🏫 Smart School</span>

        <div class="d-flex align-items-center gap-3">

            <!-- DARK MODE -->
            <button id="darkToggle"
                    class="btn btn-outline-light btn-sm rounded-circle"
                    title="Dark Mode">
                <i id="darkIcon" class="bi bi-moon-fill"></i>
            </button>

            <!-- USER -->
            <div class="text-white d-flex align-items-center gap-1">
                <i class="bi bi-person-circle fs-5"></i>
                <span><?= $_SESSION['user']['username'] ?? 'Admin' ?></span>
            </div>

            <!-- LOGOUT -->
            <a href="<?= BASE_URL ?>auth/logout.php" class="btn btn-sm btn-light">
                Logout
            </a>
        </div>
    </div>
</nav>

<!-- WRAPPER -->
<div class="container-fluid">
    <div class="row">
