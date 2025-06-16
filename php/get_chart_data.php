<?php
include "koneksi.php";

$sql = "
SELECT 
    produk.nama AS nama_produk,
    SUM(order_detail.jumlah) AS jumlah_terjual
FROM 
    order_detail
JOIN 
    produk ON produk.id_produk = order_detail.id_produk
GROUP BY 
    produk.id_produk
ORDER BY 
    jumlah_terjual DESC
LIMIT 6
";

$result = mysqli_query($conn, $sql);

$data = [
    'labels' => [],
    'values' => []
];

while ($row = mysqli_fetch_assoc($result)) {
    $data['labels'][] = $row['nama_produk'];
    $data['values'][] = (int)$row['jumlah_terjual'];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
