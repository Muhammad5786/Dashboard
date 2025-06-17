<?php
include 'koneksi.php'; // Pastikan koneksi DB sesuai

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $deskripsi = $_POST['deskripsi'];
    $alamat = $_POST['alamat'];

    // Sanitasi data (opsional tapi disarankan)
    $nama = mysqli_real_escape_string($conn, $nama);
    $no_hp = mysqli_real_escape_string($conn, $no_hp);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $alamat = mysqli_real_escape_string($conn, $alamat);

    // Update data di database
    $query = "UPDATE pelanggan 
              SET nama = '$nama', 
                  no_hp = '$no_hp', 
                  deskripsi = '$deskripsi', 
                  alamat = '$alamat' 
              WHERE id_pelanggan = '$id_pelanggan'";

    if (mysqli_query($conn, $query)) {
        // Redirect atau tampilkan pesan sukses
        header("Location: ../pages/customer.php?status=sukses_edit");
        exit;
    } else {
        echo "Gagal mengedit data: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak valid.";
}
?>
