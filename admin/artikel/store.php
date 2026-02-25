<?php
// 🔐 CEK LOGIN
require_once __DIR__ . "/../../config/auth_check.php";

// DATABASE
require_once __DIR__ . "/../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {

    // ===== VALIDASI DASAR =====
    if (
        empty($_POST['judul']) ||
        empty($_POST['isi']) ||
        empty($_POST['status'])
    ) {
        echo "<script>
            alert('❌ Semua field wajib diisi');
            history.back();
        </script>";
        exit;
    }

    $judul  = trim($_POST['judul']);
    $slug   = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $judul), '-'));
    $isi    = trim($_POST['isi']);
    $status = $_POST['status'];

    // ===== UPLOAD GAMBAR =====
    $gambar    = null;
    $uploadDir = __DIR__ . "/../uploads/artikel/";

    // pastikan folder ada
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['gambar']['name'])) {

        $allowed = ['jpg', 'jpeg', 'png'];
        $ext  = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $size = $_FILES['gambar']['size'];

        if (!in_array($ext, $allowed)) {
            echo "<script>
                alert('❌ Format gambar harus JPG, JPEG, atau PNG');
                history.back();
            </script>";
            exit;
        }

        if ($size > 2 * 1024 * 1024) {
            echo "<script>
                alert('❌ Ukuran gambar maksimal 2MB');
                history.back();
            </cript>";
            exit;
        }

        $gambar = time() . '-' . uniqid() . '.' . $ext;

        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar)) {
            echo "<script>
                alert('❌ Upload gambar gagal');
                history.back();
            </script>";
            exit;
        }
    }

    // ===== INSERT DATA (PREPARED STATEMENT) =====
    $stmt = $conn->prepare(
        "INSERT INTO artikel (judul, slug, isi, gambar, status)
         VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        echo "<script>
            alert('❌ Gagal menyiapkan query');
            history.back();
        </script>";
        exit;
    }

    $stmt->bind_param("sssss", $judul, $slug, $isi, $gambar, $status);

    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>
            alert('✅ Artikel berhasil ditambahkan');
            window.location='index.php';
        </script>";
        exit;
    } else {
        $stmt->close();
        echo "<script>
            alert('❌ Gagal menyimpan artikel');
            history.back();
        </script>";
        exit;
    }
}
