<?php
require_once __DIR__ . '/../../config/config.php';
$current = $_SERVER['REQUEST_URI'];
?>

<link rel="stylesheet" href="<?= BASE_URL ?>css/sidebar.css">

<div class="row g-0">

    <!-- SIDEBAR -->
    <div class="col-md-2 bg-dark text-white sidebar d-flex flex-column p-3">

        <!-- LOGO -->
        <div class="text-center mb-4">
            <h5 class="fw-bold mb-0">🏫 Smart School</h5>
        </div>

        <h6 class="text-uppercase text-secondary small mb-3">Menu</h6>

        <ul class="nav nav-pills flex-column gap-1">

            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'admin/index.php') ? 'active' : '' ?>"
                   href="<?= BASE_URL ?>admin/index.php">
                    📊 Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'guru') ? 'active' : '' ?>"
                   href="<?= BASE_URL ?>admin/guru/index.php">
                    👩‍🏫 Data Guru
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'kelas') ? 'active' : '' ?>"
                   href="<?= BASE_URL ?>admin/kelas/index.php">
                    🏫 Data Kelas
                </a>
            </li>

            <hr class="text-secondary my-3">

            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'artikel') ? 'active' : '' ?>"
                   href="<?= BASE_URL ?>admin/artikel/index.php">
                    📰 Artikel
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'gallery') ? 'active' : '' ?>"
                   href="<?= BASE_URL ?>admin/gallery/index.php">
                    🖼️ Gallery
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'akademik') ? 'active' : '' ?>"
                   href="<?= BASE_URL ?>admin/akademik/index.php">
                    📘 Akademik
                </a>
            </li>

            <hr class="text-secondary my-3">

            <li class="nav-item">
                <a class="nav-link text-white"
                   href="<?= BASE_URL ?>index.php" target="_blank">
                    🌍 Lihat Web Public
                </a>
            </li>

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="col-md-10 p-4">
