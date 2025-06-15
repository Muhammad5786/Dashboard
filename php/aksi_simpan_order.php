<?php
include 'koneksi.php';

// Ambil data dari form
$nama_pelanggan = $_POST['nama_pelanggan'];
$nama_produk = $_POST['nama_produk'];
$jumlah = (int)$_POST['jumlah']; // Pastikan integer
$tanggal = $_POST['tanggal'];
$via = $_POST['via'];
$status = 'Pending'; // default status

// Cari id_pelanggan
$sqlPelanggan = "SELECT id_pelanggan FROM pelanggan WHERE nama = ?";
$stmt = $conn->prepare($sqlPelanggan);
$stmt->bind_param("s", $nama_pelanggan);
$stmt->execute();
$result = $stmt->get_result();
$dataPelanggan = $result->fetch_assoc();
$id_pelanggan = $dataPelanggan['id_pelanggan'] ?? null;

// Cari id_produk dan harga dari produk
$sqlProduk = "SELECT id_produk, harga FROM produk WHERE nama = ?";
$stmt = $conn->prepare($sqlProduk);
$stmt->bind_param("s", $nama_produk);
$stmt->execute();
$result = $stmt->get_result();
$dataProduk = $result->fetch_assoc();
$id_produk = $dataProduk['id_produk'] ?? null;
$harga = $dataProduk['harga'] ?? 0;

// Hitung total
$total = $harga * $jumlah;

// Pastikan ID ditemukan
if ($id_pelanggan && $id_produk) {
    // Simpan ke order_detail
    $sqlInsert = "INSERT INTO order_detail (id_pelanggan, id_produk, jumlah, total, tanggal, status, via) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("iiissss", $id_pelanggan, $id_produk, $jumlah, $total, $tanggal, $status, $via);

    if ($stmt->execute()) {
        header("location:../pages/order.php");
    } else {
        echo "Gagal menyimpan order: " . $stmt->error;
    }
} else {
    echo "ID pelanggan atau produk tidak ditemukan.";
}
?>
