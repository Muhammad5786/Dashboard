<?php
include 'koneksi.php';

if (isset($_POST['id_order'])) {
    $id = $_POST['id_order'];

    $sql = "DELETE FROM order_detail WHERE id_detail = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/order.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
