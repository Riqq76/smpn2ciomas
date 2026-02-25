<?php
require_once "../../config/database.php";
include "../layout/header.php";
include "../layout/sidebar.php";

$data = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
$totalData = mysqli_num_rows($data);
?>

<style>
.page-title {
    font-weight: 600;
}

.modern-table {
    border-radius: 14px;
    overflow: hidden;
}

.modern-table thead {
    background: linear-gradient(90deg, #212529, #343a40);
    color: white;
    font-size: 18px;
    font-weight: 600;
}

.modern-table td {
    font-size: 17px;
}

.modern-table td,
.modern-table th {
    padding: 20px 18px;
    vertical-align: middle;
}

.modern-table tbody tr:hover {
    background-color: rgba(0,0,0,0.04);
}

.gallery-media {
    width: 140px;
    height: 90px;
    object-fit: cover;
    border-radius: 10px;
}

video.gallery-media {
    object-fit: cover;
}

.action-btn {
    font-size: 16px;
    padding: 8px 14px;
    border-radius: 8px;
}

@media (max-width: 768px) {
    .gallery-media {
        width: 110px;
        height: 75px;
    }
}
</style>

<div class="col-md-10 p-4">

    <!-- HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="page-title mb-1">📸 Gallery Sekolah</h4>
            <small class="text-muted">
                Total Data:
                <span class="badge bg-dark fs-6"><?= $totalData ?></span>
            </small>
        </div>

        <a href="tambah.php" class="btn btn-primary shadow-sm fs-6 px-4">
            ➕ Tambah Media
        </a>
    </div>

    <!-- TABLE -->
    <div class="card shadow border-0 modern-table">
        <div class="card-body p-0 table-responsive">

            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th width="70">No</th>
                        <th width="180">Media</th>
                        <th>Judul</th>
                        <th width="120">Tipe</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if ($totalData > 0): ?>
                    <?php $no = 1; while ($g = mysqli_fetch_assoc($data)) : ?>

                        <?php
                        $path = "../../uploads/" . $g['file_name'];
                        ?>

                        <tr>
                            <td class="text-center fw-semibold"><?= $no++; ?></td>

                            <td class="text-center">
                                <?php if ($g['tipe'] == 'image'): ?>
                                    <img src="<?= htmlspecialchars($path); ?>"
                                         class="gallery-media shadow-sm">
                                <?php else: ?>
                                    <video class="gallery-media shadow-sm" muted>
                                        <source src="<?= htmlspecialchars($path); ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>
                            </td>

                            <td class="fw-semibold">
                                <?= htmlspecialchars($g['judul']); ?>
                            </td>

                            <td class="text-center">
                                <?php if ($g['tipe'] == 'image'): ?>
                                    <span class="badge bg-success">Foto</span>
                                <?php else: ?>
                                    <span class="badge bg-info text-dark">Video</span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <a href="hapus.php?id=<?= (int)$g['id']; ?>"
                                   class="btn btn-danger action-btn shadow-sm"
                                   onclick="return confirm('Yakin ingin menghapus media ini?')">
                                    🗑️ Hapus
                                </a>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            <div style="font-size: 32px;">📂</div>
                            Belum ada media gallery
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include "../layout/footer.php"; ?>
