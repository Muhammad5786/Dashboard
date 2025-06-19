<?php
include 'koneksi.php';

$id_produk = $_POST['id_produk'] ?? null;
$id_stok = $_POST['id_stok'] ?? null;
$jumlah = $_POST['jumlah_dibutuhkan'] ?? null;

if ($id_produk && $id_stok && $jumlah) {
    // Cek apakah kombinasi sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM produk_bahan WHERE id_produk = $id_produk AND id_stok = $id_stok");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Bahan sudah ada di produk ini.'); window.location.href='../pages/p_bahan.php?id_produk=$id_produk';</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO produk_bahan (id_produk, id_stok, jumlah_dibutuhkan) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $id_produk, $id_stok, $jumlah);

    if ($stmt->execute()) {
        header("Location: ../pages/p_bahan.php?id_produk=$id_produk");
    } else {
        echo "Gagal menyimpan: " . $stmt->error;
    }
} else {
    echo "Data tidak lengkap.";
}
