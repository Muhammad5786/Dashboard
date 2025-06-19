<?php
include 'koneksi.php';
include 'fungsi_pengurangan_stok.php';

$id_order = $_POST['id_detail'];
$status_baru = $_POST['status'];

if ($status_baru === 'Completed') {
    $berhasil = proses_order_completed($id_order, $conn);
    if (!$berhasil) {
        exit; // proses dibatalkan, stok tidak cukup
    }
} else {
    // Untuk status selain Completed
    mysqli_query($conn, "UPDATE `order_detail` SET status = '$status_baru' WHERE id_detail = $id_order");
}

header("Location: ../pages/order.php");
exit;
