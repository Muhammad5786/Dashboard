<?php
include 'koneksi.php';

$id_stok = $_GET['id'] ?? null;
$id_produk = $_GET['id_produk'] ?? null;

if ($id_stok && $id_produk) {
    $stmt = $conn->prepare("DELETE FROM produk_bahan WHERE id_produk = ? AND id_stok = ?");
    $stmt->bind_param("ii", $id_produk, $id_stok);
    $stmt->execute();
}

header("Location: ../pages/p_bahan.php?id_produk=" . $id_produk);
exit;
