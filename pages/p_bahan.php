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
            <!-- Konek Database -->
            <?php
            include '../php/koneksi.php';

            $id_produk = $_GET['id_produk'] ?? null;
            $nama_produk = '';
            $hasil_bahan = [];

            if ($id_produk) {
                // Ambil nama produk
                $stmt = $conn->prepare("SELECT nama FROM produk WHERE id_produk = ?");
                $stmt->bind_param("i", $id_produk);
                $stmt->execute();
                $result = $stmt->get_result();
                $nama_produk = $result->fetch_assoc()['nama'] ?? '(Tidak ditemukan)';

                // Ambil bahan-bahan yang digunakan oleh produk ini
                $query = $conn->prepare("
                    SELECT 
                        stok.id_stok,
                        produk.id_produk,
                        produk.nama AS nama_produk,
                        stok.nama AS nama_bahan,
                        produk_bahan.jumlah_dibutuhkan
                    FROM produk_bahan
                    JOIN produk ON produk_bahan.id_produk = produk.id_produk
                    JOIN stok ON produk_bahan.id_stok = stok.id_stok
                    WHERE produk.id_produk = ?
                ");
                $query->bind_param("i", $id_produk);
                $query->execute();
                $hasil_bahan = $query->get_result();
            } else {
                echo "<p class='text-danger'>ID Produk tidak ditemukan.</p>";
            }
            ?>


            <?php
            $id_produk = $_GET['id_produk'] ?? null;
            $nama_produk = '';

            if ($id_produk) {
                $stmt = $conn->prepare("SELECT nama FROM produk WHERE id_produk = ?");
                $stmt->bind_param("i", $id_produk);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    $nama_produk = $row['nama'];
                } else {
                    $nama_produk = '(Produk tidak ditemukan)';
                }
            } else {
                $nama_produk = '(ID produk tidak diberikan)';
            }
            ?>
            <!--Menu Produk-->
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-2 mb-3">Bahan untuk Produk: <?= htmlspecialchars($nama_produk); ?></h3>
                        <div class="d-flex align-items-center justify-content-between btn-add-customer">
                            <div class="fw-normal my-3 quotes-customer">"Dan Dia memberinya rezeki dari arah yang tidak
                                disangka-sangkanya."
                                (65:3)
                            </div>
                            <div class="d-flex">
                                <div>
                                    <button class="btn btn-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalEditProdukBahan">
                                        <i class="bx bx-plus"></i> Tambah Bahan
                                    </button>
                                    <a href="produk.php" class="btn btn-secondary me-2">Kembali</a>
                                </div>

                            </div>

                        </div>
                        <div class="modal fade" id="modalEditProdukBahan" tabindex="-1"
                            aria-labelledby="modalEditProdukBahanLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="formProdukBahan" method="POST" action="../php/aksi_simpan_bahan.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProdukBahanLabel">Tambah Bahan untuk Produk
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">

                                            <div class="mb-3">
                                                <label for="id_stok" class="form-label">Nama Bahan</label>
                                                <select class="form-select" id="id_stok" name="id_stok" required>
                                                    <option value="">-- Pilih Bahan --</option>
                                                    <?php
                                                    $q = mysqli_query($conn, "SELECT id_stok, nama FROM stok");
                                                    while ($s = mysqli_fetch_assoc($q)) {
                                                        echo '<option value="' . $s['id_stok'] . '">' . htmlspecialchars($s['nama']) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="kebutuhan" class="form-label">Jumlah Dibutuhkan</label>
                                                <input type="number" class="form-control" id="kebutuhan"
                                                    name="jumlah_dibutuhkan" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalHapusProdukBahan" tabindex="-1"
                            aria-labelledby="modalHapusProdukBahanLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus Produk Bahan?
                                    </div>
                                    <div class="modal-footer">
                                        <form method="GET" action="../php/delete_produk_bahan.php">
                                            <input type="hidden" name="id" id="idToDelete">
                                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <div class="col-md-20 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Table Laporan list Produk Terlaris-->
                                        <div class="table-responsive rounded">
                                            <form action="../php/aksi_edit_bahan.php" method="POST">
                                                <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                                <?php if ($hasil_bahan && $hasil_bahan->num_rows > 0): ?>
                                                    <table id="tabelProduk"
                                                        class="table table-striped table-borderless py-4">
                                                        <!-- Table Head Data Produk -->
                                                        <thead>
                                                            <tr class="highlight">
                                                                <th>No</th>
                                                                <th>Nama Bahan</th>
                                                                <th>Jumlah Dibutuhkan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            while ($row = $hasil_bahan->fetch_assoc()): ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= htmlspecialchars($row['nama_bahan']) ?>
                                                                        <input type="hidden" name="id_stok[]"
                                                                            value="<?= $row['id_stok'] ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control"
                                                                            name="jumlah_dibutuhkan[]"
                                                                            value="<?= $row['jumlah_dibutuhkan'] ?>" required>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <button type="button" class="btn btn-danger me-2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#modalHapusProdukBahan"
                                                                                data-id="<?= $row['id_stok'] ?>">
                                                                                <i class="bx bx-trash"></i> Hapus
                                                                            </button>
                                                                            <button type="submit" name="edit[]"
                                                                                value="<?= $row['id_stok'] ?>"
                                                                                class="btn btn-success me-2">Simpan</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                <?php else: ?>
                                                    <p class="text-muted">Belum ada bahan untuk produk ini.</p>
                                                <?php endif; ?>
                                            </form>
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
        const modalHapus = document.getElementById('modalHapusProdukBahan');
        modalHapus.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');

            const inputHidden = modalHapus.querySelector('#idToDelete');
            inputHidden.value = id;
        });
    </script>

    <!-- jQuery harus sebelum DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabelProduk').DataTable();
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