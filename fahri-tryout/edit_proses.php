<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE posts SET title='$judul',content='$pengarang',create_at='$tanggal' WHERE id = id";

    if (mysqli_query($con, $query)) {
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    } else {
        echo mysqli_error($con);
        echo "<meta http-equiv='refresh' content='5;url=edit.php?id=$id'>";
    }
}
mysqli_close($con);
?>