<?php
require_once '../config/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ==============================
   🔐 BUAT CSRF TOKEN
============================== */
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

/* ==============================
   🚫 CEK SUDAH LOGIN
============================== */
if (isset($_SESSION['login'])) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

/* ==============================
   🛑 CEK STATUS LOCK LOGIN
============================== */
$max_attempt = 5;
$lock_time   = 300; // 5 menit

$remaining_attempt = $max_attempt - ($_SESSION['login_attempt'] ?? 0);
$is_locked = false;

if (isset($_SESSION['login_attempt']) && $_SESSION['login_attempt'] >= $max_attempt) {
    if (time() - $_SESSION['lock_time'] < $lock_time) {
        $is_locked = true;
        $remaining_time = $lock_time - (time() - $_SESSION['lock_time']);
    } else {
        $_SESSION['login_attempt'] = 0;
        $_SESSION['lock_time'] = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Smart School</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
}

.login-card {
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.secure-badge {
    font-size: 13px;
    background: #e9f5ff;
    color: #0d6efd;
    padding: 6px 12px;
    border-radius: 20px;
}
</style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

<div class="card shadow-lg p-4 login-card bg-white" style="max-width:400px; width:100%;">

    <div class="text-center mb-3">
        <h4>🔐 Login Admin</h4>
        <div class="secure-badge mt-2">
            <i class="fa-solid fa-shield-halved"></i> Secure Double Protection Active
        </div>
    </div>

    <?php if ($is_locked): ?>
        <div class="alert alert-danger text-center">
            <i class="fa-solid fa-lock"></i><br>
            Terlalu banyak percobaan login.<br>
            Coba lagi dalam <strong><?= $remaining_time ?> detik</strong>
        </div>

    <?php else: ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center py-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                Username atau password salah <br>
                <small>Sisa percobaan: <?= $remaining_attempt ?></small>
            </div>
        <?php endif; ?>

        <form action="login_proses.php" method="POST" autocomplete="off">

            <!-- CSRF TOKEN -->
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['token']; ?>">

            <!-- USERNAME -->
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" name="username" class="form-control" required>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <button class="btn btn-primary w-100 fw-semibold py-2">
                <i class="fa-solid fa-right-to-bracket"></i> Login
            </button>
        </form>

    <?php endif; ?>

    <div class="text-center mt-3">
        <small class="text-muted">
            Smart School System © <?= date('Y') ?>
        </small>
    </div>
</div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        password.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>

</body>
</html>