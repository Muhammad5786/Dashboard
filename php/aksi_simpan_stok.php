<?php
include "koneksi.php";

// Ambil data dari form
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$satuan_beli = $_POST['satuan_beli'];


// Masukkan data ke database
$sqlInsert = "INSERT INTO stok (nama, jumlah, harga, satuan_beli) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bind_param("siii", $nama, $jumlah, $harga, $satuan_beli);

if ($stmt->execute()) {
    header("Location: ../pages/stock.php?success=tambah_berhasil");
} else {
    header("Location: ../pages/stock.php?error=gagal_tambah");
}
?>
