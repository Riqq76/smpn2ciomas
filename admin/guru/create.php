<?php
include "../layout/header.php";
include "../layout/sidebar.php";
?>

<h4 class="mb-3">➕ Tambah Guru</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="store.php" method="post">

            <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama guru" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="contoh@email.com">
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx">
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">
                    ⬅️ Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    💾 Simpan
                </button>
            </div>

        </form>
    </div>
</div>

<?php include "../layout/footer.php"; ?>
