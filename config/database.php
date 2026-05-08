<?php
$conn = mysqli_connect("localhost", "root", "", "smpnciom_smartschool");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
