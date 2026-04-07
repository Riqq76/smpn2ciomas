<?php
require_once __DIR__ . '/../../config/config.php';

// ambil path sekarang
$current = $_SERVER['PHP_SELF'];
?>

<link rel="stylesheet" href="<?= BASE_ADMIN ?>../css/sidebar.css">

<div class="row g-0">

    <!-- SIDEBAR -->
    <div class="col-md-2 bg-dark text-white sidebar d-flex flex-column p-3"> 

        <div class="text-center mb-4">
            <h5 class="fw-bold mb-0">🏫 Smart School</h5>
        </div>

        <ul class="nav nav-pills flex-column gap-1">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white <?= basename($current) == 'index.php' && strpos($current,'admin') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>index.php">
                    📊 Dashboard
                </a>
            </li>

            <!-- Guru -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'guru') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>guru/index.php">
                    👩‍🏫 Data Guru
                </a>
            </li>

            <!-- Kelas -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'kelas') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>kelas/index.php">
                    🏫 Data Kelas
                </a>
            </li>

            <!-- Struktur -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'struktur') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>struktur/index.php">
                    🏢 Struktur Organisasi
                </a>
            </li>

            <hr class="text-secondary my-3">

            <!-- Artikel -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'artikel') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>artikel/index.php">
                    📰 Artikel
                </a>
            </li>

            <!-- Gallery -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'gallery') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>gallery/index.php">
                    🖼️ Gallery
                </a>
            </li>

            <!-- Pesan Kontak -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'kontak') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>kontak/index.php">
                    📩 Pesan Kontak
                </a>
            </li>


            <!-- Akademik -->
            <li class="nav-item">
                <a class="nav-link text-white <?= strpos($current,'akademik') !== false ? 'active' : '' ?>"
                href="<?= BASE_ADMIN ?>akademik/index.php">
                    📘 Akademik
                </a>
            </li>

            <hr class="text-secondary my-3">

            <!-- Public Website -->
            <li class="nav-item">
                <a class="nav-link text-white"
                href="<?= BASE_URL ?>" target="_blank">
                    🌍 Lihat Web Public 
                </a> 
            </li> 

        </ul> 

    </div> 

    <!-- CONTENT -->
    <div class="col-md-10 p-4">