<?php
require_once "../../config/auth_check.php";
require_once __DIR__ . "/../../config/database.php";


include "../layout/header.php";
include "../layout/sidebar.php";

$data = mysqli_query($conn, "SELECT * FROM struktur ORDER BY id DESC");
?>

<div class="content-wrapper p-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">🏫 Struktur Organisasi</h4>
        <a href="create.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    </div>

    <!-- DATA -->
    <div class="row g-4">
        <?php while($d = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6">

                <div class="card shadow-sm h-100 border-0">

                    <!-- FOTO -->
                    <img src="../uploads/<?= $d['foto']; ?>" 
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">

                    <!-- BODY -->
                    <div class="card-body text-center">

                        <h6 class="fw-bold mb-1"><?= $d['nama']; ?></h6>

                        <p class="text-muted small mb-2">
                            <?= $d['jabatan']; ?>
                        </p>

                        <!-- BADGE -->
                        <span class="badge bg-primary-subtle text-primary mb-3">
                            <?= strtoupper($d['kategori']); ?>
                        </span>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-center gap-2">
                            <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="delete.php?id=<?= $d['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        <?php } ?>
    </div>

</div>