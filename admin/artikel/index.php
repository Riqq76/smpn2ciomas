<?php
require_once __DIR__ . "/../../config/auth_check.php";
require_once __DIR__ . "/../../config/database.php";

include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

$data = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id DESC");
if (!$data) {
    die("Query gagal: " . mysqli_error($conn));
}

$totalData = mysqli_num_rows($data);
?>

<style>
/* TITLE */
.page-title {
    font-weight: 600;
}

/* TABLE STYLE */
.modern-table {
    border-radius: 14px;
    overflow: hidden;
}

/* HEADER TABLE BESAR */
.modern-table thead {
    background: linear-gradient(90deg, #0d6efd, #3d8bfd);
    color: white;
    font-size: 18px;
    font-weight: 600;
}

/* ISI TABLE LEBIH BESAR */
.modern-table td {
    font-size: 17px;
}

/* SPACING LEBIH LEGA */
.modern-table td,
.modern-table th {
    padding: 20px 18px;
    vertical-align: middle;
}

.modern-table tbody tr {
    transition: 0.2s ease;
}

.modern-table tbody tr:hover {
    background-color: rgba(0,0,0,0.04);
}

.table-striped>tbody>tr:nth-of-type(odd)>* {
    background-color: #fafafa;
}

/* GAMBAR */
.article-img {
    width: 90px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

/* ACTION BUTTON */
.action-btn {
    width: 40px;
    height: 40px;
    font-size: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    transition: 0.2s ease;
}

.action-btn:hover {
    transform: scale(1.1);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .modern-table thead {
        font-size: 16px;
    }

    .modern-table td {
        font-size: 16px;
    }

    .article-img {
        width: 70px;
        height: 50px;
    }
}
</style>

<div class="col-md-10 p-4">

    <!-- HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="page-title mb-1">📰 Manajemen Artikel</h4>
            <small class="text-muted">
                Total Artikel:
                <span class="badge bg-primary fs-6"><?= $totalData ?></span>
            </small>
        </div>

        <a href="create.php" class="btn btn-primary shadow-sm fs-6 px-4">
            ➕ Tambah Artikel
        </a>
    </div>

    <!-- CARD TABLE -->
    <div class="card shadow border-0 modern-table">
        <div class="card-body p-0 table-responsive">

            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th width="70">No</th>
                        <th>Judul Artikel</th>
                        <th width="140">Gambar</th>
                        <th width="120">Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if ($totalData > 0): ?>
                    <?php $no = 1; while ($a = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td class="text-center fw-semibold"><?= $no++ ?></td>

                            <td class="fw-semibold">
                                <?= htmlspecialchars($a['judul']) ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($a['gambar'])): ?>
                                    <img src="../uploads/artikel/<?= htmlspecialchars($a['gambar']) ?>"
                                         class="article-img shadow-sm">
                                <?php else: ?>
                                    <span class="badge bg-secondary fs-6">Tidak Ada</span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if ($a['status'] == 'publish'): ?>
                                    <span class="badge bg-success fs-6 px-4 py-2">
                                        Publish
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-secondary fs-6 px-4 py-2">
                                        Draft
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <a href="edit.php?id=<?= (int)$a['id'] ?>"
                                   class="btn btn-warning action-btn shadow-sm"
                                   title="Edit">
                                   ✏️
                                </a>

                                <a href="delete.php?id=<?= (int)$a['id'] ?>"
                                   onclick="return confirm('Yakin ingin menghapus artikel ini?')"
                                   class="btn btn-danger action-btn shadow-sm"
                                   title="Hapus">
                                   🗑️
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            <div style="font-size: 32px;">📂</div>
                            Belum ada artikel
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
