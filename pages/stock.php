<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donat</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">


</head>
<body>  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donat</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
                    <a href="customer.php">
                        <img src="/images/logodonat.png" alt="logo putih" class="logo-img">
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
                <!--Menu DropDown-->
                <!-- <li class="sidebar-item">
                    <a href="/pages/stock.php" class="sidebar-link collapsed has-dropdown d-flex align-items-center gap-2" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <ion-icon name="clipboard"></ion-icon>
                        <span>Stock</span>
                    </a>                    
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link d-flex align-items-center gap-2">
                                Dus
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link d-flex align-items-center gap-2">
                                Glaze
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown d-flex align-items-center gap-2" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <ion-icon name="list-outline"></ion-icon>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Two Links
                             </a>
                             <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link d-flex align-items-center gap-2">Link1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link d-flex align-items-center gap-2">Link2</a>
                                </li>
                             </ul>
                        </li>
                    </ul>
                </li> -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="notifications"></ion-icon>
                        <span>Notification</span>
                    </a>
                </li>
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="settings"></ion-icon>
                        <span>Setting</span>
                    </a>
                </li> -->
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
                        <input type="text" class="form-control border-0 rounded pe-0"
                            style="background-color:rgb(214, 214, 214);" placeholder="Search.." aria-label="Search">
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
                                <img src="../images/cha.jpeg" class="avatar img-fluid rounded-circle" alt="user avatar">
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

            <!--Menu Utama Page Customer-->
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-2 mb-2">
                            Stock
                        </h3>
                        <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'nama_terpakai') {
                                    echo "<div class='alert alert-danger'>Nama sudah digunakan, silakan gunakan nama lain.</div>";
                                } elseif ($_GET['error'] == 'gagal_tambah') {
                                    echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
                                }
                            }

                            if (isset($_GET['success']) && $_GET['success'] == 'tambah_berhasil') {
                                echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
                            }
                        ?>
                        <!--Menghubungkan Database-->
                        <?php
                            include("../php/koneksi.php");
                            $sql = "SELECT * FROM pelanggan";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <div class="d-flex align-items-center justify-content-between btn-add-stock">
                            <div class="fw-normal my-3 quotes-stock">"Dan Dia memberinya rezeki dari arah yang tidak
                                disangka-sangkanya."
                                (65:3)</div>
                            <div>
                                <button class="btn btn-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahStock">
                                    <i class="bx bx-plus"></i> Tambah Stock
                                </button>
                                                <button type="button" class="btn btn-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalHapusStock"
                                                    data-id="<?php echo $row['id_pelanggan']; ?>">
                                                    Hapus
                                                </button>
                                                            <!-- </td>
                                                            <td> -->
                                                <button type="button" class="btn btn-warning" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalEditStock"
                                                    data-id="<?php echo $row['id_pelanggan']; ?>">
                                                    Edit
                                                </button>
                            </div>
                            <!-- <div class=""> -->
                            <div class="modal fade" id="modalTambahStock" tabindex="-1"
                                aria-labelledby="modalTambahStockLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="formTambahStock" method="POST" action="../php/aksi_simpan_pelanggan.php">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahStockLabel">Tambah Stock</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                                    
                                            </div>

                                            </td>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="deskripsi" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="satuan_beli" class="form-label">Satuan Beli</label>
                                                    <input type="number" class="form-control" id="satuan_beli" name="alamat" required>
                                                </div>
                                
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalHapusStock" tabindex="-1" aria-labelledby="modalHapusStockLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus pelanggan?
                                    </div>
                                    <div class="modal-footer">
                                        <form method="GET" action="../php/delete_pelanggan.php">
                                        <input type="hidden" name="id" id="idToDelete">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                           <!-- Modal Edit Pelanggan -->
                            <div class="modal fade" id="modalEditStock" tabindex="-1" aria-labelledby="modalEditStockLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form id="formEditStock" method="POST" action="../php/aksi_edit_pelanggan.php">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditStockLabel">Edit Stock</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_bahan" class="form-label">Nama Bahan</label>
                                            <input type="text" class="form-control" id="nama" name="nama_bahan" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jumlah" class="form-label">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" class="form-control" id="harga" name="harga" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="satuan_beli" class="form-label">Satuan Beli</label>
                                            <input type="number" class="form-control" id="satuan_beli" name="satuan_beli" required>
                                        </div>
                                        </div>

                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>

                            <!-- </div> -->
                        </div>

                        <div class="table-responsive">
                            <div class="col-md-20 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Table Laporan list Customer-->
                                        <div class="table-responsive rounded">
                                            <table class="table table-striped table-borderless">
                                                <!--Table Head Customer-->
                                                <thead>
                                                    <tr class="highlight">
                                                        
                                                        <th>Nama Bahan</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Satuan Beli</th>
                                                    </tr>
                                                </thead>
                                                <!--Data stock-->
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <!-- <td><?php echo $row['id']; ?></td> -->
                                                            <td><?php echo $row['nama']; ?></td>
                                                            <td><?php echo $row['no_hp']; ?></td>
                                                            <td><?php echo $row['alamat']; ?></td>
                                                            <td><?php echo $row['deskripsi']; ?></td>
                                                            

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

            <!--Footer Customer-->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script src="../script.js"></script>
    <!-- ionicon vendor buat icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>

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

                    <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-2 mb-2">
                            Data Stok Bahan
                        </h3>
                         <p class="fw-normal pb-3">"kemudian akan diberi balasan kepadanya dengan balasan yang paling sempurna."</p>
                        <div class="table-responsive">
                            <div class="col-md-20 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Table Data Stock-->
                                        <div class="table-responsive rounded">
                                            <table class="table table-striped table-borderless">
                                                <!--Table Head Stock-->
                                                <thead>
                                                    <tr class="highlight table-danger">
                                                        <th>Nama Bahan</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Satuan Beli</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Tepung Terigu</td>
                                                        <td>10 kg</td>
                                                        <td>2025-05-10</td>
                                                        <td>2025-06-10</td>
                                                        <td>120.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gula Pasir</td>
                                                        <td>5 kg</td>
                                                        <td>2025-05-12</td>
                                                        <td>2025-06-15</td>
                                                        <td>50.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mentega</td>
                                                        <td>3 kg</td>
                                                        <td>2025-05-11</td>
                                                        <td>2025-06-01</td>
                                                        <td>75.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Keju Parut</td>
                                                        <td>2 kg</td>
                                                        <td>2025-05-13</td>
                                                        <td>2025-05-30</td>
                                                        <td>90.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coklat Bubuk</td>
                                                        <td>1.5 kg</td>
                                                        <td>2025-05-14</td>
                                                        <td>2025-07-01</td>
                                                        <td>60.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Strawberry Jam</td>
                                                        <td>1 kg</td>
                                                        <td>2025-05-15</td>
                                                        <td>2025-06-05</td>
                                                        <td>45.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Oreo Crumbs</td>
                                                        <td>2 kg</td>
                                                        <td>2025-05-13</td>
                                                        <td>2025-06-20</td>
                                                        <td>70.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telur</td>
                                                        <td>2 lusin</td>
                                                        <td>2025-05-14</td>
                                                        <td>2025-05-21</td>
                                                        <td>36.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Susu Cair</td>
                                                        <td>5 liter</td>
                                                        <td>2025-05-12</td>
                                                        <td>2025-05-25</td>
                                                        <td>55.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Matcha Powder</td>
                                                        <td>1 kg</td>
                                                        <td>2025-05-10</td>
                                                        <td>2025-06-30</td>
                                                        <td>65.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Red Velvet Mix</td>
                                                        <td>1.2 kg</td>
                                                        <td>2025-05-11</td>
                                                        <td>2025-07-10</td>
                                                        <td>58.000</td>
                                                    </tr>
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
    <script src="/script.js"></script>
    <!-- ionicon vendor buat icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>