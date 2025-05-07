<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    $query = "DELETE FROM posts WHERE id = $id";

    if (mysqli_query($con, $query)) {
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    } else {
        echo mysqli_error($con);
        echo "<meta http-equiv='refresh' content='5;url=index.php'>";
    }
}
mysqli_close($con);
?>