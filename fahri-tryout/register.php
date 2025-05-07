<?php
session_start();
//masukan koneksi
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirm = htmlspecialchars($_POST['password_confirm']);


// variable penampung error validasi
$error = [];

// pengecekan input fullname tidak boleh kosong
if (empty($fullname)) {
    $error['fullname'] = "Fullname is required";
}

if (empty($email)) {
    $error['email'] = "Email is required";
}

if (empty($password)) {
    $error['password'] = "Password is required";
}

if (empty($password_confirm)) {
    $error['password_confirm'] = "Password confirm is required";
}

// pengecekan input password dan confirm password tidak sama
if ($password !== $password_confirm) {
    $error['password_confirm'] = "Password and Confirm Password do not match";
}

// apabila ada error kirim pesan ke index.php
if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['old'] = [
        "fullname" => $fullname,
        "email" => $email,
    ];
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}

// jika tidak ada error di setiap input simpan data register ke table user
if (empty($error)) {
    // mengubah password yang di inputkan menjadi random 255 karakter
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(fullname, email, password) VALUES ('$fullname','$email','$hash_password')";

    // simpan data dengan memproses query di atas
    if (mysqli_query($con, $query)) {
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    } else {
        echo "Error: . mysqli_error($con)";
    }
}


}
?>