<?php
require_once __DIR__ . '/../../config/auth_check.php';
require_once __DIR__ . '/../../config/database.php';

include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

$data = mysqli_query($conn, "SELECT * FROM pesan_kontak ORDER BY id DESC");
$total = mysqli_num_rows($data);
?>

<div class="container-fluid mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">📩 Pesan Kontak</h4>
        <span class="badge bg-primary fs-6"><?= $total ?> Pesan</span>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">

                    <thead class="table-dark">
                        <tr class="text-center">
                            <th style="width:5%">No</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Pesan</th>
                            <th style="width:15%">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if($total > 0) { ?>
                            <?php $no = 1; while($d = mysqli_fetch_assoc($data)) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>

                                    <td>
                                        <span class="fw-semibold"><?= $d['email'] ?></span>
                                    </td>

                                    <td>
                                        <span class="text-muted"><?= $d['no_hp'] ?></span>
                                    </td>

                                    <td style="max-width:300px;">
                                        <div class="text-truncate" title="<?= $d['pesan'] ?>">
                                            <?= $d['pesan'] ?>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <small class="text-muted">
                                            <?= date('d M Y H:i', strtotime($d['created_at'])) ?>
                                        </small>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada pesan masuk
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>