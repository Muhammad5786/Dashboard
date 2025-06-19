<?php
include 'koneksi.php';

if (isset($_POST['id_produk'], $_POST['id_stok'], $_POST['jumlah_dibutuhkan'])) {
    $id_produk = $_POST['id_produk'];
    $id_stok = $_POST['id_stok'];
    $jumlah = $_POST['jumlah_dibutuhkan'];

    mysqli_query($conn, "INSERT INTO produk_bahan (id_produk, id_stok, jumlah_dibutuhkan) VALUES ($id_produk, $id_stok, $jumlah)");
    header("Location: p_bahan.php?id_produk=$id_produk");
    exit;
}
echo "Gagal menambahkan bahan.";
