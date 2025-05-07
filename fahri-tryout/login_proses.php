<?php
session_start();
// masukkan file koneksi
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    // ambil nilai dari input email dan password
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // cek apakah input email dan password tidak kosong
    if (empty($email) || empty($password)){
        $_SESSION['login_error'] = "Email or Password are required";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        exit();
    }

    //
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // kondisi email dan password valid
        // bawa id dan fullname user yang login ke dashboard.php
        $_SESSION['user_id'] =  $user['id'];
        $_SESSION['fullname'] =  $user['fullname'];
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    } else {
        // kondisi email dan password tidak valid
        $_SESSION['login_error'] = "Invalid email or password";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }
}
?>