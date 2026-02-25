<?php
// 🔐 CEK LOGIN
require_once __DIR__ . "/../../config/auth_check.php";

// DATABASE
require_once __DIR__ . "/../../config/database.php";

// LAYOUT
include __DIR__ . "/../layout/header.php";
include __DIR__ . "/../layout/sidebar.php";

// Ambil data guru
$data = mysqli_query($conn, "SELECT * FROM guru");
$totalData = mysqli_num_rows($data);
?>

<style>
.page-title {
    font-weight: 600;
}

/* TABLE STYLE */
.modern-table {
    border-radius: 12px;
    overflow: hidden;
}

/* HEADER TABLE LEBIH BESAR */
.modern-table thead {
    background: linear-gradient(90deg, #198754, #20c997);
    color: white;
    font-size: 18px; /* lebih besar */
    font-weight: 600;
}

/* ISI TABLE LEBIH BESAR */
.modern-table td {
    font-size: 17px; /* ukuran tulisan isi */
}

/* SPACING LEBIH LEGA */
.modern-table td,
.modern-table th {
    padding: 18px 16px;
    vertical-align: middle;
}

.modern-table tbody tr {
    transition: 0.2s ease;
}

.modern-table tbody tr:hover {
    background-color: rgba(0,0,0,0.04);
}

.table-striped>tbody>tr:nth-of-type(odd)>* {
    background-color: #f9f9f9;
}

/* ACTION BUTTON */
.action-btn {
    width: 38px;
    height: 38px;
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
    max-width: 280px;
}

/* MOBILE */
@media (max-width: 768px) {
    .modern-table thead {
        font-size: 16px;
    }

    .modern-table td {
        font-size: 16px;
    }
}

</style>

<div class="col-md-10 p-4">

    <!-- HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="page-title mb-1">👨‍🏫 Data Guru</h4>
            <small class="text-muted">
                Total Guru: 
                <span class="badge bg-success"><?= $totalData ?></span>
            </small>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <input type="text" id="searchTable"
                   class="form-control search-box"
                   placeholder="🔍 Cari guru...">

            <a href="create.php" class="btn btn-success shadow-sm">
                ➕ Tambah Guru
            </a>
        </div>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm border-0 modern-table">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="text-center">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="guruTable">

                    <?php if ($totalData > 0): ?>
                        <?php $no = 1; while ($g = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td class="text-center fw-semibold"><?= $no++ ?></td>

                            <td>
                                <div class="fw-semibold">
                                    👨‍🏫 <?= htmlspecialchars($g['nama']) ?>
                                </div>
                            </td>

                            <td>
                                <?= $g['email']
                                    ? '<span class="badge bg-primary-subtle text-primary px-3 py-2">'
                                        . htmlspecialchars($g['email']) .
                                      '</span>'
                                    : '<span class="badge bg-secondary px-3 py-2">-</span>'
                                ?>
                            </td>

                            <td>
                                <?= $g['no_hp']
                                    ? '<span class="badge bg-info-subtle text-info px-3 py-2">'
                                        . htmlspecialchars($g['no_hp']) .
                                      '</span>'
                                    : '<span class="badge bg-secondary px-3 py-2">-</span>'
                                ?>
                            </td>

                            <td class="text-center">
                                <a href="edit.php?id=<?= $g['id'] ?>"
                                   class="btn btn-warning btn-sm action-btn shadow-sm"
                                   title="Edit">
                                   ✏️
                                </a>

                                <a href="delete.php?id=<?= $g['id'] ?>"
                                   class="btn btn-danger btn-sm action-btn shadow-sm"
                                   onclick="return confirm('Yakin ingin menghapus data guru ini?')"
                                   title="Hapus">
                                   🗑️
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <div style="font-size: 28px;">📂</div>
                                Data guru belum tersedia
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
    let rows = document.querySelectorAll("#guruTable tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ""
            : "none";
    });
});
</script>

<?php include __DIR__ . "/../layout/footer.php"; ?>
