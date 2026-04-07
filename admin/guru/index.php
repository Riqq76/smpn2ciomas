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

<div class="col-md-10 py-4">

    <!-- HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1">👨‍🏫 Data Guru</h4>
            <small class="text-muted">
                Total Guru: 
                <span class="badge bg-success"><?= $totalData ?></span>
            </small>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <input type="text" id="searchTable"
                   class="form-control"
                   style="max-width: 280px;"
                   placeholder="🔍 Cari guru...">

            <a href="create.php" class="btn btn-success shadow-sm">
                ➕ Tambah Guru
            </a>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="guruTable">
                        <?php if ($totalData > 0): ?>
                            <?php $no = 1; while ($g = mysqli_fetch_assoc($data)): ?>
                            <tr>
                                <td class="text-center fw-semibold"><?= $no++ ?></td>

                                <td class="fw-semibold">
                                    👨‍🏫 <?= htmlspecialchars($g['nama']) ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($g['email']): ?>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            <?= htmlspecialchars($g['email']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary px-3 py-2">-</span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($g['no_hp']): ?>
                                        <span class="badge bg-info-subtle text-info px-3 py-2">
                                            <?= htmlspecialchars($g['no_hp']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary px-3 py-2">-</span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <a href="edit.php?id=<?= $g['id'] ?>"
                                       class="btn btn-warning btn-sm shadow-sm"
                                       title="Edit">
                                       ✏️
                                    </a>

                                    <a href="delete.php?id=<?= $g['id'] ?>"
                                       class="btn btn-danger btn-sm shadow-sm"
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