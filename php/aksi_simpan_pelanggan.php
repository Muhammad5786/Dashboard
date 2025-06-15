<?php
    include "koneksi.php";

        // Mendapatkan data dari form
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $deskripsi = $_POST['deskripsi'];
        $alamat = $_POST['alamat'];

        // Query tambah data mahasiswa
        $sql = "INSERT INTO pelanggan (nama, no_hp, deskripsi, alamat) VALUES ('$nama', '$no_hp', '$deskripsi', '$alamat')";
        if (mysqli_query($conn, $sql)) {
            header("location:../pages/customer.php");
        } else {
            header("location:../pages/customer.php");
        }
?>