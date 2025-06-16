<!DOCTYPE html>
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
                    <a href="customer.html">
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
                    <a href="../pages/customer.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="people"></ion-icon>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../pages/order.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="cart"></ion-icon>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../pages/stock.php" class="sidebar-link d-flex align-items-center gap-2">
                        <ion-icon name="clipboard"></ion-icon>
                        <span>Stock</span>
                    </a>
                </li>
                <!--Menu DropDown-->
                <!-- <li class="sidebar-item">
                    <a href="/pages/stock.html" class="sidebar-link collapsed has-dropdown d-flex align-items-center gap-2" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
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
                            Customer
                        </h3>
                        <!--Menghubungkan Database-->
                        <?php
                            include("../php/koneksi.php");
                            $sql = "SELECT * FROM pelanggan";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <div class="d-flex align-items-center justify-content-between btn-add-customer">
                            <div class="fw-normal my-3 quotes-customer">"Dan Dia memberinya rezeki dari arah yang tidak
                                disangka-sangkanya."
                                (65:3)</div>
                            <div>
                                <button class="btn btn-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahCustomer">
                                    <i class="bx bx-plus"></i> Tambah Customer
                                </button>
                            </div>
                            <!-- <div class=""> -->
                            <div class="modal fade" id="modalTambahCustomer" tabindex="-1"
                                aria-labelledby="modalTambahCustomerLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="formTambahCustomer" method="POST" action="../php/aksi_simpan_pelanggan.php">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahCustomerLabel">Tambah customer</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_id" class="form-label">No HP</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalHapusCustomer" tabindex="-1" aria-labelledby="modalHapusCustomerLabel" aria-hidden="true">
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
                            <div class="modal fade" id="modalEditCustomer" tabindex="-1" aria-labelledby="modalEditCustomerLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form id="formEditCustomer" method="POST" action="../php/aksi_edit_pelanggan.php">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditCustomerLabel">Edit Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                    <input type="hidden" id="id" name="id"> <!-- ID pelanggan -->

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
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
                                                        <!-- <th>No</th> -->
                                                        <th>Nama</th>
                                                        <th>NO HP</th>
                                                        <th>Alamat</th>
                                                        <th>Deskripsi</th>
                                                        <th>Aksi</th>
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
                                                            <td>
                                                                <button type="button" class="btn btn-danger" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#modalHapusCustomer"
                                                                    data-id="<?php echo $row['id_pelanggan']; ?>">
                                                                    Hapus
                                                                </button>
                                                            <!-- </td>
                                                            <td> -->
                                                                <button type="button" class="btn btn-success" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#modalEditCustomer"
                                                                    data-id="<?php echo $row['id_pelanggan']; ?>">
                                                                    Edit
                                                                </button>
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

            <!--Footer Customer-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-light">
                        <div class="col-6 text-start">
                            <a href="../index.html" class="ps-3">
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