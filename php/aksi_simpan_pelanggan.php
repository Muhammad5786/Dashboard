<?php
include "koneksi.php";

// Ambil data dari form
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$deskripsi = $_POST['deskripsi'];
$alamat = $_POST['alamat'];
$tanggal_bergabung = date("Y-m-d");

// Cek apakah nama sudah ada
$sqlCek = "SELECT id_pelanggan FROM pelanggan WHERE nama = ?";
$stmt = $conn->prepare($sqlCek);
$stmt->bind_param("s", $nama);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Jika nama sudah terpakai
    header("Location: ../pages/customer.php?error=nama_terpakai");
    exit;
}

// Masukkan data ke database
$sqlInsert = "INSERT INTO pelanggan (nama, no_hp, deskripsi, alamat, tanggal_bergabung) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bind_param("sssss", $nama, $no_hp, $deskripsi, $alamat, $tanggal_bergabung);

if ($stmt->execute()) {
    header("Location: ../pages/customer.php?success=tambah_berhasil");
} else {
    header("Location: ../pages/customer.php?error=gagal_tambah");
}
?>
