<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE nama = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href = '../pages/register.php';</script>";
        exit;
    }

    if ($password !== $confirm) {
        echo "<script>alert('Konfirmasi password tidak cocok!'); window.location.href = '../pages/register.php';</script>";
        exit;
    }

    // Enkripsi password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (nama, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = '../pages/login.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
