<?php
include 'koneksi.php';

// Ambil data dari form
$nama_pelanggan = $_POST['nama_pelanggan'];
$nama_produk = $_POST['nama_produk'];
$jumlah = (int) $_POST['jumlah']; // Pastikan integer
$tanggal = $_POST['tanggal'];
$via = $_POST['via'];
$status = 'Pending'; // default status
$topping_terpilih = $_POST['topping'] ?? [];
$topping_string = implode(', ', $topping_terpilih);

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

// ❗CEK STOK sebelum simpan
$stok_kurang = [];

if ($id_produk) {
    $query_bahan = mysqli_query($conn, "
        SELECT s.nama AS nama_stok, s.jumlah AS stok_tersedia, pb.jumlah_dibutuhkan, pb.id_stok
        FROM produk_bahan pb
        JOIN stok s ON pb.id_stok = s.id_stok
        WHERE pb.id_produk = $id_produk
    ");

    while ($bahan = mysqli_fetch_assoc($query_bahan)) {
        $stok_tersedia = $bahan['stok_tersedia'];
        $jumlah_dibutuhkan = $bahan['jumlah_dibutuhkan'] * $jumlah;

        if ($stok_tersedia < $jumlah_dibutuhkan) {
            $stok_kurang[] = $bahan['nama_stok'];
        }
    }
}

// Jika ada stok yang kurang, tampilkan alert
if (!empty($stok_kurang)) {
    $list = implode(', ', $stok_kurang);
    echo "<script>
        alert('Stok tidak cukup untuk bahan: $list. Order dibatalkan.');
        window.location.href = '../pages/order.php';
    </script>";
    exit;
}

// Jika ID valid dan stok cukup, simpan
if ($id_pelanggan && $id_produk) {
    $sqlInsert = "INSERT INTO order_detail (id_pelanggan, id_produk, jumlah, total, tanggal, status, via, topping)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("iiisssss", $id_pelanggan, $id_produk, $jumlah, $total, $tanggal, $status, $via, $topping_string);


    if ($stmt->execute()) {
        header("location:../pages/order.php");
    } else {
        echo "Gagal menyimpan order: " . $stmt->error;
    }
} else {
    echo "ID pelanggan atau produk tidak ditemukan.";
}

// ✅ CEK STOK TOPPING jika ada yang dipilih
foreach ($topping_terpilih as $top) {
    $query = mysqli_query($conn, "SELECT jumlah FROM stok WHERE nama = '$top'");
    $data = mysqli_fetch_assoc($query);

    if (!$data || $data['jumlah'] < $jumlah) {
        echo "<script>alert('Stok topping \"$top\" tidak cukup!'); window.location.href = '../pages/order.php';</script>";
        exit;
    }
}

?>