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

<div class="col-md-10 py-4">

    <!-- HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1">🏫 Data Kelas</h4>
            <small class="text-muted">
                Total Data:
                <span class="badge bg-primary fs-6"><?= $totalData ?></span>
            </small>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <input type="text" id="searchTable"
                   class="form-control"
                   style="max-width: 300px;"
                   placeholder="🔍 Cari kelas...">

            <a href="create.php" class="btn btn-primary shadow-sm fs-6 px-4">
                ➕ Tambah Kelas
            </a>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 70px;">No</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th style="width: 160px;">Aksi</th>
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

                                <td class="text-center">
                                    <?php if ($k['wali']): ?>
                                        <span class="badge bg-success">
                                            👨‍🏫 <?= htmlspecialchars($k['wali']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            Belum Ada Wali
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <a href="edit.php?id=<?= $k['id'] ?>"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                       ✏️
                                    </a>

                                    <a href="delete.php?id=<?= $k['id'] ?>"
                                       class="btn btn-danger btn-sm"
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