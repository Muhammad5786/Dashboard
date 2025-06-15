<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM order_detail WHERE id_detail = '$id'";
    if (mysqli_query($conn, $sql)) {
            header("location:../pages/order.php");
        } else {
            header("location:../pages/order.php");
        }
} else {
    echo "ID tidak ditemukan.";
}
?>
