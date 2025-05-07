<?php
session_start();
// Masukkan file koneksi.php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Ambil user_id dari session
     $user_id = $_SESSION["user_id"];

    // Ambil nilai pada input tambah.php
    $judul = htmlspecialchars($_POST["judul"]);
    $pengarang = htmlspecialchars($_POST["pengarang"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);

    // Masukan Query INSERT ke table users
    $query = "INSERT INTO posts(user_id, title, content, create_at) VALUES ('$user_id','$judul','$pengarang','$tanggal')";

    //  Lakukan proses simpan data
    $result = mysqli_query($con, $query);

    // Cek apalah data berhasil disimpan
    if($result) {
        //Jika berhasil kembalikan ke halaman index
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    } else {
        // Jika gagal tampilkan error
        echo mysqli_error($con);
    }

    // Tutup Konelsi
    mysqli_close($con);
}
?>