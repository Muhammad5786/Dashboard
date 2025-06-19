<?php
include "koneksi.php";

// Ambil data dari form
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];


// Masukkan data ke database
$sqlInsert = "INSERT INTO produk (nama, harga) VALUES (?, ?)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bind_param("si", $nama_produk, $harga);

if ($stmt->execute()) {
    header("Location: ../pages/produk.php?success=tambah_berhasil");
} else {
    header("Location: ../pages/produk.php?error=gagal_tambah");
}
?>
