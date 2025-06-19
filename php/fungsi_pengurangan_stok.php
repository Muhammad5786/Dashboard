<?php
function proses_order_completed($id_order, $conn)
{
    $cek = mysqli_query($conn, "SELECT status FROM `order_detail` WHERE id_detail = $id_order");
    $data = mysqli_fetch_assoc($cek);

    if (!$data || $data['status'] === 'Completed') {
        return false;
    }

    mysqli_begin_transaction($conn);
    try {
        $produk_result = mysqli_query($conn, "
            SELECT id_produk, jumlah AS jumlah_order
            FROM order_detail
            WHERE id_detail = $id_order
        ");

        while ($produk = mysqli_fetch_assoc($produk_result)) {
            $id_produk = $produk['id_produk'];
            $jumlah_order = $produk['jumlah_order'];

            $bahan_result = mysqli_query($conn, "
                SELECT id_stok, jumlah_dibutuhkan
                FROM produk_bahan
                WHERE id_produk = $id_produk
            ");

            while ($bahan = mysqli_fetch_assoc($bahan_result)) {
                $id_stok = $bahan['id_stok'];
                $jumlah_dibutuhkan = $bahan['jumlah_dibutuhkan'];
                $jumlah_total = $jumlah_order * $jumlah_dibutuhkan;

                $cek_stok = mysqli_query($conn, "SELECT jumlah FROM stok WHERE id_stok = $id_stok");
                $stok = mysqli_fetch_assoc($cek_stok);

                if ($stok['jumlah'] < $jumlah_total) {
                    // Ambil nama stok
                    $nama_query = mysqli_query($conn, "SELECT nama FROM stok WHERE id_stok = $id_stok");
                    $stok_nama = mysqli_fetch_assoc($nama_query)['nama'];

                    mysqli_rollback($conn);
                    echo "<script>alert('Stok \"$stok_nama\" tidak cukup!'); window.location.href = '../pages/order.php';</script>";
                    return false;
                }


                mysqli_query($conn, "
                    UPDATE stok
                    SET jumlah = jumlah - $jumlah_total
                    WHERE id_stok = $id_stok
                ");
            }
        }

        // ✅ Kurangi topping jika ada
        $topping_result = mysqli_query($conn, "
    SELECT topping, jumlah
    FROM order_detail
    WHERE id_detail = $id_order");

        while ($row = mysqli_fetch_assoc($topping_result)) {
            if ($row['topping']) {
                $topping_list = explode(', ', $row['topping']);
                $jumlah_order = $row['jumlah'];

                foreach ($topping_list as $top) {
                    $top = mysqli_real_escape_string($conn, $top);

                    mysqli_query($conn, "
                UPDATE stok
                SET jumlah = jumlah - $jumlah_order
                WHERE nama = '$top'
            ");
                }
            }
        }

        mysqli_query($conn, "UPDATE `order_detail` SET status = 'Completed' WHERE id_detail = $id_order");
        mysqli_commit($conn);
        return true;
    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "Gagal memproses order: " . $e->getMessage();
        return false;
    }



}
