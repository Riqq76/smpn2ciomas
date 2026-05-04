<?php
require_once __DIR__ . "/../../config/database.php";

mysqli_query($conn, "
    INSERT INTO guru (nama, email, no_hp)
    VALUES (
        '$_POST[nama]',
        '$_POST[email]',
        '$_POST[no_hp]'
    )
");

header("Location: index.php");
exit;
