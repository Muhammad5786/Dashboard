<?php
include 'koneksi.php'; // pastikan file koneksi ini benar

if (isset($_GET['id_stok'])) {
    $id = $_GET['id_stok'];

    // Cek apakah data ada
    $cek = mysqli_query($conn, "SELECT * FROM stok WHERE id_stok = '$id'");
    if (mysqli_num_rows($cek) > 0) {
        // Hapus data
        $hapus = mysqli_query($conn, "DELETE FROM stok WHERE id_stok = '$id'");

        if ($hapus) {
            // Redirect ke halaman sebelumnya dengan pesan sukses
            header("Location: ../pages/stock.php?pesan=hapus_sukses");
            exit;
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan di URL.";
}
?>
