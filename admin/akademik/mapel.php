<?php
session_start();
require_once __DIR__ . "/../../config/database.php";




/* =========================
   PROSES TAMBAH / EDIT
========================= */
if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    if($id == ""){
        mysqli_query($conn,"INSERT INTO mata_pelajaran (nama,deskripsi)
                            VALUES ('$nama','$deskripsi')");
        header("Location: mapel.php?success=1");
    } else {
        mysqli_query($conn,"UPDATE mata_pelajaran
                            SET nama='$nama', deskripsi='$deskripsi'
                            WHERE id=$id");
        header("Location: mapel.php?updated=1");
    }
    exit;
}

/* =========================
   PROSES HAPUS
========================= */
if(isset($_GET['hapus'])){
    $id = intval($_GET['hapus']);
    mysqli_query($conn,"DELETE FROM mata_pelajaran WHERE id=$id");
    header("Location: mapel.php?deleted=1");
    exit;
}

/* =========================
   AMBIL DATA
========================= */
$data = mysqli_query($conn,"SELECT * FROM mata_pelajaran ORDER BY id DESC");
?>

<?php include "../layout/header.php"; ?>
<?php include "../layout/sidebar.php"; ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">📘 Kelola Mata Pelajaran</h4>
        <a href="index.php" class="btn btn-outline-secondary btn-sm">
            ← Kembali
        </a>
    </div>

    <!-- ALERT -->
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Data berhasil ditambahkan.</div>
    <?php endif; ?>

    <?php if(isset($_GET['updated'])): ?>
        <div class="alert alert-primary">✏️ Data berhasil diperbarui.</div>
    <?php endif; ?>

    <?php if(isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">🗑 Data berhasil dihapus.</div>
    <?php endif; ?>

    <!-- FORM -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <form method="POST" class="row g-3">

                <input type="hidden" name="id" id="id">

                <div class="col-md-5">
                    <label class="form-label">Nama Mata Pelajaran</label>
                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           placeholder="Contoh: Matematika"
                           required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                              id="deskripsi"
                              class="form-control"
                              rows="1"
                              placeholder="Deskripsi singkat"></textarea>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit"
                            name="simpan"
                            class="btn btn-success w-100">
                        💾 Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $no=1;
                while($d=mysqli_fetch_assoc($data)): 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="fw-semibold">
                            <?= htmlspecialchars($d['nama']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($d['deskripsi']) ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning"
                                onclick="
                                    document.getElementById('id').value='<?= $d['id'] ?>';
                                    document.getElementById('nama').value='<?= htmlspecialchars($d['nama'],ENT_QUOTES) ?>';
                                    document.getElementById('deskripsi').value='<?= htmlspecialchars($d['deskripsi'],ENT_QUOTES) ?>';
                                ">
                                ✏️ Edit
                            </button>

                            <a href="?hapus=<?= $d['id'] ?>"
                               onclick="return confirm('Yakin ingin menghapus?')"
                               class="btn btn-sm btn-danger">
                                🗑 Hapus
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>

                <?php if(mysqli_num_rows($data) == 0): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data mata pelajaran.
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include "../layout/footer.php"; ?>
