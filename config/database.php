<?php
$conn = mysqli_connect("localhost", "root", "", "smartschool");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
