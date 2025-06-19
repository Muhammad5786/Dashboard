<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Cek cookie auto-login
if (isset($_COOKIE['remember_username'])) {
    $_SESSION['username'] = $_COOKIE['remember_username'];
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $query = "SELECT * FROM user WHERE nama = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // LOGIN TANPA HASH
        if ($password === $user['password']) {
            $_SESSION['username'] = $user['nama'];

            if ($remember) {
                setcookie('remember_username', $user['nama'], time() + (86400 * 7), "/");
            }

            header("Location: ../index.php");
            exit;
        }
    }

    echo "<script>alert('Username atau password salah!');window.location.href='../pages/login.php';</script>";
    exit;
}
?>
