<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donat</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


</head>
<body>  
    <!--Pembungkus Class Wrapper dengan Display Flex-->
    <div class="wrapper">
        <!--SideBar Web-->
        <aside id="sidebar">
            <!--Logo Icon Hamburger Sidebar-->
           <div class="d-flex justify-content-between p-4">
                <div class="sidebar-logo">
                    <a href="../index.php">
                        <img src="../images/logodonat.png" alt="logo putih" class="logo-img">
                    </a>
                </div>
                <button class="toggle-btn border-0" type="button">
                    <ion-icon id="icon" name="menu"></ion-icon>
                </button>
            </div>
            <!--List Menu SideBar-->
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="../index.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="home"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="customer.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="people"></ion-icon>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="produk.php" class="sidebar-link d-flex align-items-center gap-2">
                       <ion-icon name="cube"></ion-icon>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="order.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="cart"></ion-icon>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="stock.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="clipboard"></ion-icon>
                        <span>Stock</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="notifications"></ion-icon>
                        <span>Notification</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer mb-3">
                <a href="#" class="sidebar-link d-flex align-items-center gap-2">
                    <ion-icon name="log-out-outline"></ion-icon>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!--Konten Utama-->
        <div class="main">
            <!--Navbar-->
            <nav class="navbar navbar-expand px-4 py-3">
                <!--Nabar samping Kiri: Form Input Navbar (Search)-->
                <form action="#" class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control border-0 rounded pe-0" style="background-color:rgb(214, 214, 214);"placeholder="Search.." aria-label="Search">
                        <button class="btn btn-rounded" type="button">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </form>
                <!--Navbar samping Kanan: Notification dan Foto Profile-->
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <!--Notification-->
                        <button class="btn btn-rounded me-2" type="button" style="color: rgb(150, 17, 98);">
                            <ion-icon name="notifications"></ion-icon>
                        </button>
                        <!--Foto Profile-->
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../images/mybini.jpeg" class="avatar img-fluid rounded-circle" alt="user avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded-0 border-0 shadow mt-3">
                                <a href="#" class="dropdown-item">
                                    <ion-icon name="layers-outline"></ion-icon>
                                    <span>Analytics</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <ion-icon name="layers-outline"></ion-icon>
                                    <span>Setting</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Modal Tambah Order -->
            <div class="modal fade" id="modalTambahOrder" tabindex="-1" aria-labelledby="modalTambahOrderLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formTambahOrder" method="POST" action="../php/aksi_simpan_order.php">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahOrderLabel">Tambah Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                      </div>
                      
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="tanggal" class="form-label">Tanggal</label>
                          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="mb-3">
                          <label for="nama" class="form-label">Nama Customer</label>
                          <input type="text" class="form-control" id="nama" name="nama_pelanggan" list="listPelanggan" required>
                          <!-- Pelanggan -->
                        <datalist id="listPelanggan">
                        <?php
                        include '../php/koneksi.php';
                        $sql = "SELECT nama FROM pelanggan";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['nama'] . "'>";
                        }
                        ?>
                        </datalist>
                        </div>

                        <div class="mb-3">
                          <label for="pesanan" class="form-label">Pesanan</label>
                          <input type="text" class="form-control" id="pesanan" name="nama_produk" list="listProduk" required>
                          <!-- Produk -->
                            <datalist id="listProduk">
                            <?php
                            $sql = "SELECT DISTINCT nama FROM produk";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['nama'] . "'>";
                            }
                            ?>
                            </datalist>
                        </div>

                        <div class="mb-3">
                          <label for="jumlah" class="form-label">Jumlah</label>
                          <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="mb-3">
                            <label for="via" class="form-label">Via</label>
                            <input type="text" class="form-control" id="via" placeholder="Contoh: Cash, Transfer, dll" name="via" required>
                        </div>


                            <div class="mb-3">                                
                            <label for="toping" class="form-label">Toping</label>
                            <div class="form-check">
                                <div class="d-flex">
                                    <div class="w-50">
                                        <div class="w-50">
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Keju" id="check1">
                                                <label class="form-check-label" for="check1">Keju</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Gula Halus" id="check2">
                                                <label class="form-check-label" for="check2">Gula Halus</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Selai Stroberi" id="check3">
                                                <label class="form-check-label" for="check3">Selai Stroberi</label>
                                            </div>
                                        </div>

                                        <div class="w-50">
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Matcha Glaze" id="check4">
                                                <label class="form-check-label" for="check4">Matcha Glaze</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Krim Keju" id="check5">
                                                <label class="form-check-label" for="check5">Krim Keju</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Puree Mangga" id="check6">
                                                <label class="form-check-label" for="check6">Puree Mangga</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="w-50">
                                        <div class="w-50">
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Madu" id="check7">
                                                <label class="form-check-label" for="check7">Madu</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Keju Parut" id="check8">
                                                <label class="form-check-label" for="check8">Keju Parut</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Oreo Crumbs" id="check9">
                                                <label class="form-check-label" for="check9">Oreo Crumbs</label>
                                            </div>
                                        </div>

                                        <div class="w-50">
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Nutella" id="check10">
                                                <label class="form-check-label" for="check10">Nutella</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Tiramisu Powder" id="check11">
                                                <label class="form-check-label" for="check11">Tiramisu Powder</label>
                                            </div>
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" value="Red Velvet Crumbs" id="check12">
                                                <label class="form-check-label" for="check12">Red Velvet Crumbs</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- <label for="via" class="form-label">Via</label> -->
                            <!-- <input type="text" class="form-control" id="via" placeholder="Contoh: Cash, Transfer, dll" name="via" required> -->
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                      </div>
                    </form>
                </div>
            </div>
            </div>

            <!-- Modal Hapus Order -->
            <div class="modal fade" id="modalHapusOrder" tabindex="-1" aria-labelledby="modalHapusOrderLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus order ini?
                </div>
                <div class="modal-footer">
                    <form method="GET" action="../php/delete_order.php">
                    <input type="hidden" name="id" id="orderIdToDelete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                </div>
            </div>
            </div>

            <!-- Edit Status Order -->
            <div class="modal fade" id="modalEditStatus" tabindex="-1" aria-labelledby="modalEditStatusLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditStatus" method="POST" action="../php/aksi_edit_status.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditStatusLabel">Edit Status Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Input untuk ID Order -->
                                <input type="hidden" id="id_detail" name="id_detail">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Baru</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!--Menu Order-->
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-bold fs-2 mb-2">
                            Customer
                        </h3>
                        <div>
                            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalTambahOrder">
                                <i class="bx bx-plus"></i> Tambah Order
                            </button>
                        </div>
                    </div>
                        <p class="fw-normal pb-3">"Dan Dia telah memberikan kepadamu (keperluanmu) dan segala apa yang kamu mohonkan kepadanya."</p>
                        <!--Menghubungkan Database-->
                        <?php
                            $sql = "SELECT 
                                order_detail.id_detail,
                                order_detail.tanggal,
                                order_detail.jumlah,
                                order_detail.total,
                                order_detail.tanggal,
                                order_detail.status,
                                order_detail.via,
                                produk.nama AS nama_produk,
                                pelanggan.nama AS nama_pelanggan
                                FROM order_detail
                                JOIN pelanggan ON order_detail.id_pelanggan = pelanggan.id_pelanggan
                                JOIN produk ON order_detail.id_produk = produk.id_produk
                                ORDER BY order_detail.tanggal DESC;";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <div class="table-responsive">
                            <div class="col-md-20 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Table Laporan list Produk Terlaris-->
                                        <div class="table-responsive rounded">
                                            <table class="table table-striped table-borderless">
                                            <!--Table Head Produk Terlaris-->
                                            <thead>
                                                <tr class="highlight">
                                                <th>Tanggal</th>
                                                <th>Nama (Customer)</th>
                                                <th>Pesanan</th>
                                                <th>Jumlah</th>
                                                <th>Harga Total</th>
                                                <th>Status</th>
                                                <th>Via</th>
                                                <th>Aksi</th>
                                                </tr>  
                                            </thead>
                                            <!--Data stock-->
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td><?php echo $row['tanggal']; ?></td>
                                                            <td><?php echo $row['nama_pelanggan']; ?></td>
                                                            <td><?php echo $row['nama_produk']; ?></td>
                                                            <td><?php echo $row['jumlah']; ?></td>
                                                            <td><?php echo $row['total']; ?></td>
                                                            <td class="font-weight-medium">
                                                                <div class="badge 
                                                                    <?php 
                                                                        if ($row['status'] == 'Pending') {
                                                                            echo 'badge-warning';
                                                                        } elseif ($row['status'] == 'Canceled') {
                                                                            echo 'badge-danger';
                                                                        } elseif ($row['status'] == 'Completed') {
                                                                            echo 'badge-success';
                                                                        }
                                                                    ?>">
                                                                    <?php echo $row['status']; ?>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $row['via']; ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalHapusOrder"
                                                                    data-id="<?php echo $row['id_detail']; ?>">
                                                                    Hapus
                                                                </button>
                                                                <button type="button" class="btn btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalEditStatus"
                                                                    onclick="setEditStatus('<?php echo $row['id_detail']; ?>', '<?php echo $row['status']; ?>')">
                                                                    Edit Status
                                                                </button>

                                                                <script>
                                                                function setEditStatus(id, status) {
                                                                    document.getElementById('id_detail').value = id;
                                                                    document.getElementById('status').value = status;
                                                                }
                                                                </script>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <!--Footer DashBoard-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-light">
                        <div class="col-6 text-start">
                            <a href="../index.php" class="ps-3">
                                <img src="../images/logodonat.png" alt="logo putih" class="logo-img">
                            </a>
                        </div>
                        <div class="col-6 text-end text-light d-none d-md-block">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class="text-light">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-light">About</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-light">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--Buat chart dari scriptjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
    <!-- ionicon vendor buat icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body> 
</html>