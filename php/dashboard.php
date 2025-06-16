<?php
include 'koneksi.php';

// Order Hari Ini
$result_today = mysqli_query($conn, "SELECT COUNT(*) as total FROM order_detail WHERE tanggal = CURDATE()");
$order_today = mysqli_fetch_assoc($result_today)['total'];

// Total Order
$result_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM order_detail");
$total_order = mysqli_fetch_assoc($result_total)['total'];

// Omzet Bulan Ini
$result_omzet = mysqli_query($conn, "
    SELECT SUM(total) as omzet 
    FROM order_detail 
    WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())
");
$omzet_bulan_ini = mysqli_fetch_assoc($result_omzet)['omzet'] ?? 0;

// Total Pelanggan
$result_pelanggan = mysqli_query($conn, "SELECT COUNT(*) as total FROM pelanggan");
$total_pelanggan = mysqli_fetch_assoc($result_pelanggan)['total'];

// Pelanggan bulan ini
$bulan_ini = date('Y-m');
$sql_bulan_ini = "SELECT COUNT(*) AS total FROM pelanggan WHERE DATE_FORMAT(tanggal_bergabung, '%Y-%m') = ?";
$stmt = $conn->prepare($sql_bulan_ini);
$stmt->bind_param("s", $bulan_ini);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$jumlah_bulan_ini = (int)$result['total'];

// Pelanggan bulan lalu
$bulan_lalu = date('Y-m', strtotime('-1 month'));
$sql_bulan_lalu = "SELECT COUNT(*) AS total FROM pelanggan WHERE DATE_FORMAT(tanggal_bergabung, '%Y-%m') = ?";
$stmt = $conn->prepare($sql_bulan_lalu);
$stmt->bind_param("s", $bulan_lalu);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$jumlah_bulan_lalu = (int)$result['total'];

// Hitung pertumbuhan
if ($jumlah_bulan_lalu > 0) {
    $persentase = (($jumlah_bulan_ini - $jumlah_bulan_lalu) / $jumlah_bulan_lalu) * 100;
} else {
    $persentase = $jumlah_bulan_ini > 0 ? 100 : 0; // kalau bulan lalu nol
}

echo number_format($persentase, 2); // misal "23.45"

// Hitung rata-rata order harian bulan lalu
$result_bulan_lalu = mysqli_query($conn, "
    SELECT COUNT(*)/DAY(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))) as rata_rata 
    FROM order_detail 
    WHERE MONTH(tanggal) = MONTH(CURDATE() - INTERVAL 1 MONTH)
    AND YEAR(tanggal) = YEAR(CURDATE())
");
$rata_bulan_lalu = mysqli_fetch_assoc($result_bulan_lalu)['rata_rata'] ?? 1;

// Hitung kenaikan
if ($rata_bulan_lalu > 0) {
    $persen_kenaikan = round((($order_today - $rata_bulan_lalu) / $rata_bulan_lalu) * 100, 2);
} else {
    $persen_kenaikan = 100; // atau 0, tergantung logika yang kamu inginkan
}

// Omzet bulan ini
$result_omzet = mysqli_query($conn, "
    SELECT SUM(total) as omzet 
    FROM order_detail 
    WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())
");
$omzet_bulan_ini = mysqli_fetch_assoc($result_omzet)['omzet'] ?? 0;

// Omzet bulan lalu
$result_omzet_lalu = mysqli_query($conn, "
    SELECT SUM(total) as omzet 
    FROM order_detail 
    WHERE MONTH(tanggal) = MONTH(CURDATE() - INTERVAL 1 MONTH) 
    AND YEAR(tanggal) = YEAR(CURDATE())
");
$omzet_bulan_lalu = mysqli_fetch_assoc($result_omzet_lalu)['omzet'] ?? 0;

// Hitung persentase kenaikan omzet
if ($omzet_bulan_lalu > 0) {
    $persen_kenaikan_omzet = round((($omzet_bulan_ini - $omzet_bulan_lalu) / $omzet_bulan_lalu) * 100, 2);
} else {
    $persen_kenaikan_omzet = 100; // atau 0 jika kamu ingin neutral
}

// Pelanggan bulan ini
$result_pelanggan_ini = mysqli_query($conn, "
    SELECT COUNT(*) as total 
    FROM pelanggan 
    WHERE MONTH(tanggal_bergabung) = MONTH(CURDATE()) 
    AND YEAR(tanggal_bergabung) = YEAR(CURDATE())
");
$pelanggan_bulan_ini = mysqli_fetch_assoc($result_pelanggan_ini)['total'] ?? 0;

// Pelanggan bulan lalu
$result_pelanggan_lalu = mysqli_query($conn, "
    SELECT COUNT(*) as total 
    FROM pelanggan 
    WHERE MONTH(tanggal_bergabung) = MONTH(CURDATE() - INTERVAL 1 MONTH)
    AND YEAR(tanggal_bergabung) = YEAR(CURDATE())
");
$pelanggan_bulan_lalu = mysqli_fetch_assoc($result_pelanggan_lalu)['total'] ?? 0;

// Hitung persentase kenaikan pelanggan
if ($pelanggan_bulan_lalu > 0) {
    $persen_kenaikan_pelanggan = round((($pelanggan_bulan_ini - $pelanggan_bulan_lalu) / $pelanggan_bulan_lalu) * 100, 2);
} else {
    $persen_kenaikan_pelanggan = 100;
}

//Hitung produk terlaris
$sql_terlaris = "
SELECT 
    produk.nama AS nama_produk,
    produk.harga,
    SUM(order_detail.jumlah) AS jumlah_terjual
FROM 
    order_detail
JOIN 
    produk ON produk.id_produk = order_detail.id_produk
GROUP BY 
    order_detail.id_produk
ORDER BY 
    jumlah_terjual DESC
LIMIT 6
";

$result_terlaris = mysqli_query($conn, $sql_terlaris);
?>
