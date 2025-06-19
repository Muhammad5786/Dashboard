<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produk = $_POST['id_produk'];
    $id_stok_arr = $_POST['id_stok'];
    $jumlah_arr = $_POST['jumlah_dibutuhkan'];

    foreach ($id_stok_arr as $i => $id_stok) {
        $jumlah = (int)$jumlah_arr[$i];

        // Update jumlah_dibutuhkan di tabel produk_bahan
        $stmt = $conn->prepare("UPDATE produk_bahan SET jumlah_dibutuhkan = ? WHERE id_produk = ? AND id_stok = ?");
        $stmt->bind_param("iii", $jumlah, $id_produk, $id_stok);
        $stmt->execute();
    }

    header("Location: ../pages/p_bahan.php?id_produk=$id_produk");
    exit;
}
?>
