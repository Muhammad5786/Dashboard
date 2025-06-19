<?php include '../php/cek_login.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../style.css">


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
                <!-- Logo kiri -->
                <div class="d-flex align-items-center me-3">
                    <a href="../index.php">
                        <img src="../images/logodonat1.png" alt="Logo Donat" class="logo-navbar-toggle">
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
                                <img src="../images/mybini.jpeg" class="avatar img-fluid rounded-circle my-1"
                                    alt="user avatar">
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

            <!-- Modal Tambah Produk -->
            <div class="modal fade" id="modalTambahOrder" tabindex="-1" aria-labelledby="modalTambahOrderLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formTambahOrder" method="POST" action="../php/aksi_simpan_order.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahOrderLabel">Tambah Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="nama" name="nama_pelanggan"
                                        list="listPelanggan" required>
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
                                    <input type="text" class="form-control" id="pesanan" name="nama_produk"
                                        list="listProduk" required>
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
                                    <input type="text" class="form-control" id="via"
                                        placeholder="Contoh: Cash, Transfer, dll" name="via" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Produk -->
            <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-labelledby="modalTambahProdukLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahProdukLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        <form action="../php/aksi_simpan_produk.php" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <!-- Modal Hapus Order -->
            <!-- Modal Hapus Produk -->
            <div class="modal fade" id="modalHapusProduk" tabindex="-1" aria-labelledby="modalHapusProdukLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="../php/delete_produk.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalHapusProdukLabel">Konfirmasi Hapus Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus produk ini?
                                <input type="hidden" name="id_produk" id="produkIdToDelete">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!--Menu Produk-->
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-2 mb-3">Produk</h3>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <p class="fw-normal mb-0">"Dan Dia telah memberikan kepadamu (keperluanmu) dan segala
                                    apa yang kamu mohonkan kepadanya."</p>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahProduk">+ Tambah Produk
                                </button>

                            </div>
                        </div>


                        <!--Menghubungkan Database-->
                        <?php
                        $sql = "SELECT * FROM produk;";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <div class="table-responsive">
                            <div class="col-md-20 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Table Laporan list Produk Terlaris-->
                                        <div class="table-responsive rounded">
                                            <table id="tabelProduk" class="table table-striped table-borderless py-4">
                                                <!-- Table Head Data Produk -->
                                                <thead>
                                                    <tr class="highlight">
                                                        <th>Nama Produk</th>
                                                        <th>Harga</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <!--Data Produk-->
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <!--Menghubungkan Database-->
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td><?php echo $row['nama']; ?></td>
                                                            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-danger btn-md" data-bs-toggle="modal"
                                                                    data-bs-target="#modalHapusProduk"
                                                                    data-id="<?php echo $row['id_produk']; ?>">
                                                                    Hapus
                                                                </button>
                                                                <a href="p_bahan.php?id_produk=<?php echo $row['id_produk']; ?>"
                                                                    class="btn btn-warning btn-md">
                                                                    Edit
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('modalHapusProduk');
            modal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                document.getElementById('produkIdToDelete').value = id;
            });
        });
    </script>

    <!-- jQuery harus sebelum DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabelProduk').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50]
            });
        });
    </script>


    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Script JS kamu sendiri -->
    <script src="../script.js"></script>
</body>

</html>