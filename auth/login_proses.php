<?php
session_start();
require_once __DIR__ . "/../config/database.php";

/* ==============================
   🚫 CEGAH AKSES LANGSUNG
============================== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

/* ==============================
   🔐 VALIDASI CSRF TOKEN
============================== */
if (!isset($_POST['csrf_token']) || 
    !isset($_SESSION['token']) || 
    $_POST['csrf_token'] !== $_SESSION['token']) {

    die("Akses tidak valid (CSRF detected).");
}

/* ==============================
   🛑 BATASI LOGIN GAGAL
============================== */
$max_attempt = 5;
$lock_time   = 300; // 5 menit

if (!isset($_SESSION['login_attempt'])) {
    $_SESSION['login_attempt'] = 0;
}

if (!isset($_SESSION['lock_time'])) {
    $_SESSION['lock_time'] = 0;
}

// Jika sedang dikunci
if ($_SESSION['login_attempt'] >= $max_attempt) {

    if (time() - $_SESSION['lock_time'] < $lock_time) {
        die("Terlalu banyak percobaan login. Coba lagi dalam 5 menit . ");
    } else {
        // Reset jika waktu blokir sudah lewat
        $_SESSION['login_attempt'] = 0;
        $_SESSION['lock_time'] = 0;
    }
}

/* ==============================
   AMBIL & VALIDASI INPUT
============================== */
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: login.php?error=empty");
    exit;
}

/* ==============================
   QUERY USER (PREPARED STATEMENT)
============================== */
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, username, password, role FROM users WHERE username = ? LIMIT 1"
);

if (!$stmt) {
    die("Query error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user   = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

/* ==============================
   🔑 VERIFIKASI PASSWORD
============================== */
if ($user && password_verify($password, $user['password'])) {

    // 🔐 Amankan Session
    session_regenerate_id(true);

    // Reset login attempt
    $_SESSION['login_attempt'] = 0;
    $_SESSION['lock_time'] = 0;

    // Simpan session login
    $_SESSION['login'] = true;
    $_SESSION['user'] = [
        'id'       => $user['id'],
        'username' => $user['username'],
        'role'     => $user['role']
    ];

    header("Location: ../admin/index.php");
    exit;

} else {

    // Tambah percobaan gagal
    $_SESSION['login_attempt']++;

    if ($_SESSION['login_attempt'] >= $max_attempt) {
        $_SESSION['lock_time'] = time();
    }

    header("Location: login.php?error=invalid");
    exit;
}