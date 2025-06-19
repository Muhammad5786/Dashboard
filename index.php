<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /pages/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donat</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--Pembungkus Class Wrapper dengan Display Flex-->
    <div class="wrapper">
        <!--SideBar Web-->
        <aside id="sidebar">
            <!--Logo Icon Hamburger Sidebar-->
            <div class="d-flex justify-content-between p-4">
                <div class="sidebar-logo">
                    <a href="index.php">
                        <img src="images/logodonat.png" alt="logo putih" class="logo-img">
                    </a>
                </div>
                <button class="toggle-btn border-0" type="button">
                    <ion-icon id="icon" name="menu"></ion-icon>
                </button>
            </div>
            <!--List Menu SideBar-->
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="home"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pages/customer.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="people"></ion-icon>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pages/produk.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="cube"></ion-icon>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pages/order.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="cart"></ion-icon>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pages/stock.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="clipboard"></ion-icon>
                        <span>Stock</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer mb-3">
                <a href="php/logout.php" class="sidebar-link d-flex align-items-center gap-2">
                    <ion-icon name="log-out-outline"></ion-icon>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!--Konten Utama-->
        <div class="main">
            <!--Navbar-->
            <nav class="navbar navbar-expand px-4 py-3">
                <!-- Logo kiri -->
                <div class="d-flex align-items-center me-3">
                    <a href="index.php">
                        <img src="images/logodonat1.png" alt="Logo Donat" class="logo-navbar-toggle">
                    </a>
                </div>
                <!--Navbar samping Kanan: Foto Profile-->
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <!--Username-->
                        <li>
                            <p class="mt-2 me-3 fw-bold">Atmin</p>
                        </li>
                        <!--Foto Profile-->
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="images/mybini.jpeg" class="avatar img-fluid rounded-circle my-1"
                                    alt="user avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded-0 border-0 shadow mt-3">
                                <a href="php/logout.php" class="dropdown-item">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                    <span>Logout</span>
                                </a>
                                <a href="pages/register.php" class="dropdown-item">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                    <span>Register</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--Menu Utama DashBoard-->
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <!--Kalimat Selamat Datang Pembuka di DashBoard-->
                        <h3 class="fw-bold fs-2 mb-2">
                            Selamat datang, (Nama)!
                        </h3>
                        <div hidden>\
                            <?php
                            include("php/dashboard.php");
                            ?>
                        </div>

                        <!--TagLine Website-->
                        <p class="fw-normal pb-3">"Dan Dia memberinya rezeki dari arah yang tidak disangka-sangkanya."
                            (65:3)</p>
                        <!--Buat Row utk manajemen layout-->
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <!--Buat Carousel Foto Donat-->
                                <div id="donatCarousel" class="carousel shadow slide mb-4" data-bs-ride="carousel">
                                    <!-- Aspect ratio 9:16 -->
                                    <div class="ratio ratio-16x9">
                                        <div class="carousel-inner rounded">
                                            <div class="carousel-item active">
                                                <img src="images/donat4.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover rounded"
                                                    alt="carousel 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="images/donat5.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover rounded"
                                                    alt="carousel 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="images/donat3.jpg"
                                                    class="d-block w-100 h-100 object-fit-cover rounded"
                                                    alt="carousel 3">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tombol navigasi -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#donatCarousel"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#donatCarousel"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-lg-6 grid-margin transparent">
                                <!--Buat Laporan Dalam Bentuk Row-->
                                <div class="row">
                                    <!--Info Laporan Oder Hari ini-->
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-stat shadow">
                                            <div class="card-body">
                                                <p class="mb-3 ms-2 fw-bold">Order hari ini</p>
                                                <h2 class="mb-2 ms-2 fw-bold"><?php echo $order_today; ?></h2>
                                                <span class="badge text-success">
                                                    <?php include 'php/dashboard.php'; ?>%
                                                    <ion-icon name="arrow-up-outline"></ion-icon>
                                                </span>
                                                <span>
                                                    Dari Bulan Ini
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Info Laporan Total Order-->
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-stat shadow">
                                            <div class="card-body">
                                                <p class="mb-3 ms-2 fw-bold">Total order</p>
                                                <h2 class="mb-2 ms-2 fw-bold"><?php echo $total_order; ?></h2>
                                                <span class="badge text-success" style="font-size: 1.1rem;">
                                                    <?php echo $persen_kenaikan; ?>% <ion-icon
                                                        name="arrow-up-outline"></ion-icon>
                                                </span>
                                                <span>
                                                    Dari Bulan Ini
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Buat dalam bentuk Laporan tiap Row (Baris Baru)-->
                                <div class="row">
                                    <!--Info Laporan Omzet-->
                                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                        <div class="card card-stat shadow">
                                            <div class="card-body">
                                                <p class="mb-3 ms-2 fw-bold">Omzet bulan ini</p>
                                                <h2 class="mb-2 ms-2 fw-bold">
                                                    Rp<?php echo number_format($omzet_bulan_ini, 0, ',', '.'); ?></h2>
                                                <span class="badge text-success" style="font-size: 1.1rem;">
                                                    <?php echo $persen_kenaikan_omzet; ?>% <ion-icon
                                                        name="arrow-up-outline"></ion-icon>
                                                </span>
                                                <span>
                                                    Dari Bulan Ini
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Info Laporan Total Pelanggan-->
                                    <div class="col-md-6 stretch-card transparent">
                                        <div class="card card-stat shadow">
                                            <div class="card-body">
                                                <p class="mb-3 ms-2 fw-bold">Total pelanggan</p>
                                                <h2 class="mb-2 ms-2 fw-bold"><?php echo $total_pelanggan; ?></h2>
                                                <span class="badge text-success" style="font-size: 1.1rem;">
                                                    <?php echo $persen_kenaikan_pelanggan; ?>% <ion-icon
                                                        name="arrow-up-outline"></ion-icon>
                                                </span>
                                                <span>
                                                    Dari Bulan Ini
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--row bawah (Laporan Produk Terlaris dan Laporan Penjualan)-->
                        <div class="row mt-4">
                            <div class="col-md-7 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="fw-bold fs-4 my-3">
                                            Produk Terlaris
                                        </h3>
                                        <!--Table Laporan list Produk Terlaris-->
                                        <div class="table-responsive rounded">
                                            <table class="table table-striped table-borderless">
                                                <!--Table Head Produk Terlaris-->
                                                <thead>
                                                    <tr class="highlight">
                                                        <th>Produk</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah Terjual</th>
                                                    </tr>
                                                </thead>
                                                <!--Data Produk terlaris-->
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($result_terlaris)): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                                                            <td class="font-weight-bold">
                                                                Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                                            </td>
                                                            <td><?php echo $row['jumlah_terjual']; ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Laporan Penjualan Donat dan Kue dalam bentuk grafik batang per bulan-->
                            <div class="col-12 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="fw-bold fs-4 my-3">
                                            Laporan Penjualan
                                        </h3>
                                        <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
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
                            <a href="index.php" class="ps-3">
                                <img src="images/logodonat.png" alt="logo putih" class="logo-img">
                            </a>
                        </div>
                        <div class="col-6 text-end text-light d-none d-md-block">
                            <ul class="list-inline mt-2">
                                <li class="list-inline-item">
                                    <a href="https://dmimahdonuts.carrd.co/" class="text-light" target="_blank"
                                        rel="noopener">
                                        dmimahdonuts.carrd.co
                                    </a>
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
    <script src="script.js"></script>
    <!-- ionicon vendor buat icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>