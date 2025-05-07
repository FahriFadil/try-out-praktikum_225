<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "fahri_tryout";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Koneksi Gagal " . mysqli_connect_error());
}
?>