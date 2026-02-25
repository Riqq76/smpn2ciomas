<?php
// 🔐 CEK LOGIN
require_once __DIR__ . "/../../config/auth_check.php";

// DATABASE
require_once __DIR__ . "/../../config/database.php";

// LAYOUT
include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

// DATA
$data = mysqli_query($conn, "
    SELECT kelas.*, guru.nama AS wali
    FROM kelas
    LEFT JOIN guru ON kelas.wali_guru_id = guru.id
");

$totalData = mysqli_num_rows($data);
?>

<style>
.page-title {
    font-weight: 600;
}

/* TABLE STYLE */
.modern-table {
    border-radius: 14px;
    overflow: hidden;
}

/* HEADER TABLE LEBIH BESAR */
.modern-table thead {
    background: linear-gradient(90deg, #ffc107, #ffcd39);
    color: #212529;
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

/* ACTION BUTTON LEBIH BESAR */
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

.search-box {
    max-width: 300px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .modern-table thead {
        font-size: 16px;
    }

    .modern-table td {
        font-size: 16px;
    }

    .search-box {
        max-width: 100%;
    }
}
</style>

<div class="col-md-10 p-4">

    <!-- HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="page-title mb-1">🏫 Data Kelas</h4>
            <small class="text-muted">
                Total Data:
                <span class="badge bg-primary fs-6"><?= $totalData ?></span>
            </small>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <input type="text" id="searchTable"
                   class="form-control search-box"
                   placeholder="🔍 Cari kelas...">

            <a href="create.php" class="btn btn-primary shadow-sm fs-6 px-4">
                ➕ Tambah Kelas
            </a>
        </div>
    </div>

    <!-- CARD TABLE -->
    <div class="card shadow border-0 modern-table">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th width="70">No</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kelasTable">

                    <?php if ($totalData > 0): ?>
                        <?php $no = 1; while ($k = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td class="text-center fw-semibold"><?= $no++ ?></td>

                            <td class="fw-semibold">
                                <?= htmlspecialchars($k['nama_kelas']) ?>
                            </td>

                            <td>
                                <?php if ($k['wali']): ?>
                                    <span class="badge bg-success-subtle text-success px-4 py-2 fs-6">
                                        👨‍🏫 <?= htmlspecialchars($k['wali']) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-secondary px-4 py-2 fs-6">
                                        Belum Ada Wali
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <a href="edit.php?id=<?= $k['id'] ?>"
                                   class="btn btn-warning action-btn shadow-sm"
                                   title="Edit">
                                   ✏️
                                </a>

                                <a href="delete.php?id=<?= $k['id'] ?>"
                                   class="btn btn-danger action-btn shadow-sm"
                                   onclick="return confirm('Yakin ingin menghapus data kelas ini?')"
                                   title="Hapus">
                                   🗑️
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-5">
                                <div style="font-size: 32px;">📂</div>
                                Data kelas belum tersedia
                            </td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById("searchTable").addEventListener("keyup", function () {
    let keyword = this.value.toLowerCase();
    let rows = document.querySelectorAll("#kelasTable tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ""
            : "none";
    });
});
</script>

<?php include __DIR__ . "/../layout/footer.php"; ?>
