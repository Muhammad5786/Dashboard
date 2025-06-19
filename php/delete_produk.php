<?php
include 'koneksi.php';

if (isset($_POST['id_produk'])) {
    $id = $_POST['id_produk'];

    $query = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");

    if ($query) {
        header("Location: ../pages/produk.php"); // Ganti sesuai halamanmu
        exit();
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($conn);
    }
} else {
    echo "ID Produk tidak ditemukan.";
}
?>
