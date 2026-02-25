<?php
session_start();
include "../../config/database.php";


/* =========================
   PROSES HAPUS
========================= */
if(isset($_GET['hapus'])){
    mysqli_query($conn, "DELETE FROM kurikulum");
    header("Location: kurikulum.php?deleted=1");
    exit;
}

/* =========================
   AMBIL DATA
========================= */
$query = mysqli_query($conn, "SELECT * FROM kurikulum LIMIT 1");
$row = mysqli_fetch_assoc($query);

/* =========================
   PROSES SIMPAN
========================= */
if(isset($_POST['simpan'])){

    $isi = mysqli_real_escape_string($conn, $_POST['isi']);

    if($row){
        mysqli_query($conn, "UPDATE kurikulum 
                             SET isi='$isi' 
                             WHERE id=".$row['id']);
    } else {
        mysqli_query($conn, "INSERT INTO kurikulum (isi) 
                             VALUES ('$isi')");
    }

    header("Location: kurikulum.php?success=1");
    exit;
}
?>

<?php include "../layout/header.php"; ?>
<?php include "../layout/sidebar.php"; ?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">📘 Kelola Kurikulum</h4>
        <a href="index.php" class="btn btn-outline-secondary btn-sm">
            ← Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <!-- ALERT -->
            <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    ✅ Kurikulum berhasil disimpan.
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['deleted'])): ?>
                <div class="alert alert-danger">
                    ❌ Kurikulum berhasil dihapus.
                </div>
            <?php endif; ?>

            <!-- FORM -->
            <form method="POST">

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Isi Kurikulum
                    </label>

                    <textarea 
                        name="isi" 
                        class="form-control"
                        rows="12"
                        placeholder="Masukkan isi kurikulum di sini..."
                        required><?= htmlspecialchars($row['isi'] ?? '') ?></textarea>
                </div>

                <!-- BUTTON GROUP -->
                <div class="d-flex flex-wrap gap-2">

                    <button type="submit" 
                            name="simpan" 
                            class="btn btn-success">
                        💾 Simpan
                    </button>

                    <?php if($row): ?>
                        <a href="?hapus=1"
                           onclick="return confirm('Yakin ingin menghapus kurikulum?')"
                           class="btn btn-danger">
                            🗑 Hapus
                        </a>
                    <?php endif; ?>

                    <a href="index.php" 
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

<?php include "../layout/footer.php"; ?>
