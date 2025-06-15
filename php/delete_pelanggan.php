<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus terlebih dahulu data dari order_detail
    $hapusOrder = "DELETE FROM order_detail WHERE id_pelanggan = '$id'";
    mysqli_query($conn, $hapusOrder);

    // Lalu hapus data dari pelanggan
    $hapusPelanggan = "DELETE FROM pelanggan WHERE id_pelanggan = '$id'";
    mysqli_query($conn, $hapusPelanggan);

    header("Location: ../pages/customer.php");
    exit();
}
?>
