<?php
session_start();
include "../../config/database.php";


/* =========================
   PROSES TAMBAH / EDIT
========================= */
if(isset($_POST['simpan'])){

    $id    = $_POST['id'];
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $url   = mysqli_real_escape_string($conn, $_POST['url']);

    if($id == "") {
        mysqli_query($conn, "INSERT INTO link_buku (judul,url)
                             VALUES ('$judul','$url')");
        header("Location: link_buku.php?success=1");
    } else {
        mysqli_query($conn, "UPDATE link_buku
                             SET judul='$judul', url='$url'
                             WHERE id=$id");
        header("Location: link_buku.php?updated=1");
    }
    exit;
}

/* =========================
   PROSES HAPUS
========================= */
if(isset($_GET['hapus'])){
    $id = intval($_GET['hapus']);
    mysqli_query($conn, "DELETE FROM link_buku WHERE id=$id");
    header("Location: link_buku.php?deleted=1");
    exit;
}

/* =========================
   AMBIL DATA
========================= */
$data = mysqli_query($conn, "SELECT * FROM link_buku ORDER BY id DESC");
?>

<?php include "../layout/header.php"; ?>
<?php include "../layout/sidebar.php"; ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">📚 Kelola Link Buku</h4>
        <a href="index.php" class="btn btn-outline-secondary btn-sm">
            ← Kembali
        </a>
    </div>

    <!-- ALERT -->
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Link berhasil ditambahkan.</div>
    <?php endif; ?>

    <?php if(isset($_GET['updated'])): ?>
        <div class="alert alert-primary">✏️ Link berhasil diperbarui.</div>
    <?php endif; ?>

    <?php if(isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">🗑 Link berhasil dihapus.</div>
    <?php endif; ?>

    <!-- FORM -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <form method="POST" class="row g-3">

                <input type="hidden" name="id" id="id">

                <div class="col-md-5">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul" id="judul"
                           class="form-control"
                           placeholder="Masukkan judul buku"
                           required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Link Buku</label>
                    <input type="url" name="url" id="url"
                           class="form-control"
                           placeholder="https://example.com"
                           required>
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
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Link</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $no=1; 
                while($d = mysqli_fetch_assoc($data)): 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($d['judul']) ?></td>
                        <td>
                            <a href="<?= htmlspecialchars($d['url']) ?>" 
                               target="_blank"
                               class="btn btn-sm btn-outline-primary">
                               🔗 Lihat
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning"
                                onclick="
                                    document.getElementById('id').value='<?= $d['id'] ?>';
                                    document.getElementById('judul').value='<?= htmlspecialchars($d['judul'],ENT_QUOTES) ?>';
                                    document.getElementById('url').value='<?= htmlspecialchars($d['url'],ENT_QUOTES) ?>';
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
                            Belum ada data link buku.
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include "../layout/footer.php"; ?>
