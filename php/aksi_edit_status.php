<?php
// Koneksi ke database
include "koneksi.php";

// Cek apakah data dikirim via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_detail = $_POST['id_detail'];
    $status_baru = $_POST['status'];

    // Validasi sederhana
    if ($id_detail && $status_baru) {
        // Update status di tabel order_detail
        $sql = "UPDATE order_detail SET status = ? WHERE id_detail = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $status_baru, $id_detail);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect ke halaman order dengan pesan sukses
            header("Location: ../pages/order.php");
            exit();
        } else {
            echo "Gagal mengubah status.";
        }
    } else {
        echo "ID dan Status harus diisi.";
    }
} else {
    echo "Akses tidak sah.";
}
?>
