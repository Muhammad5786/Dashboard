<?php
include 'koneksi.php';

if (isset($_POST['id_produk'], $_POST['jumlah_dibutuhkan'])) {
    $id_produk = $_POST['id_produk'];
    foreach ($_POST['jumlah_dibutuhkan'] as $id_bahan => $jumlah) {
        $jumlah = intval($jumlah);
        mysqli_query($conn, "UPDATE produk_bahan SET jumlah_dibutuhkan = $jumlah WHERE id_bahan = $id_bahan AND id_produk = $id_produk");
    }
    header("Location: ../pages/p_bahan.php?id_produk=$id_produk");
    exit;
}
echo "Data tidak lengkap.";
