<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_stok'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $satuan_beli = $_POST['satuan_beli'];

    $query = "UPDATE stok SET 
                nama = '$nama', 
                jumlah = '$jumlah', 
                harga = '$harga', 
                satuan_beli = '$satuan_beli'
              WHERE id_stok = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../pages/stock.php?pesan=update_sukses");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>
