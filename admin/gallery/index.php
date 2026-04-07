<?php 
require_once "../../config/database.php"; 
include "../layout/header.php";
include "../layout/sidebar.php";

// Ambil data gallery
$data = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
$totalData = mysqli_num_rows($data);
?>

<div class="col-md-10 p-4">

    <!-- HEADER -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 class="fw-bold mb-1">📸 Gallery Sekolah</h4>
                <small class="text-muted">
                    Total Data: <span class="badge bg-dark"><?= $totalData ?></span>
                </small>
            </div>

            <a href="tambah.php" class="btn btn-primary shadow-sm">
                ➕ Tambah Media
            </a>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Media</th>
                        <th scope="col" class="text-start">Judul</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($totalData > 0): ?>
                        <?php $no = 1; while ($g = mysqli_fetch_assoc($data)) : ?>
                            <?php $path = "../../public/uploads/" . $g['file_name']; ?>
                            <tr>
                                <td><?= $no++; ?></td>

                                <!-- MEDIA -->
                                <td class="text-center">
                                    <?php if ($g['tipe'] == 'image'): ?>
                                        <div class="card shadow-sm rounded" style="width:140px; height:90px;">
                                            <img src="<?= htmlspecialchars($path); ?>" class="card-img-top h-100 w-100" alt="<?= htmlspecialchars($g['judul']); ?>" style="object-fit:cover;">
                                        </div>
                                    <?php else: ?>
                                        <div class="card shadow-sm rounded" style="width:140px; height:90px;">
                                            <video class="card-img-top h-100 w-100" controls style="object-fit:cover;">
                                                <source src="<?= htmlspecialchars($path); ?>" type="video/mp4">
                                            </video>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <!-- JUDUL -->
                                <td class="text-start fw-semibold">
                                    <?= htmlspecialchars($g['judul']); ?>
                                </td>

                                <!-- TIPE -->
                                <td>
                                    <?php if ($g['tipe'] == 'image'): ?>
                                        <span class="badge bg-success">Foto</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Video</span>
                                    <?php endif; ?>
                                </td>

                                <!-- AKSI -->
                                <td>
                                    <a href="hapus.php?id=<?= (int)$g['id']; ?>" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus media ini?')">
                                        🗑️ Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?> 
                        <tr> 
                            <td colspan="5" class="py-5 text-center text-muted">
                                <div class="fs-1">📂</div>
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