<?php
session_start();
if (!isset($_SESSION['nama_pelanggan'])) {
    header("location:login.php");
}
include "conn.php";
function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}
$no_meja = $_SESSION['no_meja'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= "Meja " . $_SESSION['no_meja']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $_SESSION['nama_pelanggan']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gelato
            </div>
            <li class="nav-item">
                <a class="nav-link pb-0" href="pesan-meja.php">
                    <i class="fas fa-utensils"></i>
                    <span>
                        Pesan
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <?php
                $bayar = mysqli_query($conn, "SELECT * FROM pesanan WHERE no_meja=$no_meja AND status_makanan > 0 OR status_pesanan > 0 ");
                // SELECT * FROM meja WHERE status_meja='1' AND status_nota='1'
                $status = mysqli_num_rows($bayar);
                if ($status > 0) {
                ?>
                    <a class="nav-link pb-0" href="pesan-meja.php?alert=pesan">
                    <?php
                } else { ?>
                        <a class="nav-link pb-0" href="logout-pelanggan.php?no=<?= $no_meja; ?>&kd=1">
                        <?php } ?>
                        <i class="fas fa-sign-out-alt"></i>
                        <span>
                            Exit
                        </span>
                        </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1 class="h3 text-gray-800"><?= "Meja " . $_SESSION['no_meja']; ?></h1>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <?php
                    $total = 0;
                    $query = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_meja' AND status_makanan=0 AND status_pesanan=0");
                    $cek = mysqli_num_rows($query);
                    if ($cek > 0) { ?>
                        <h1 class="h3 mb-4 text-gray-800">Pesanan</h1>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Makanan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $data['nama_makanan']; ?></td>
                                        <td><?= $data['jumlah_makanan']; ?></td>
                                        <td><?= "Rp. " . format_ribuan($data['harga_makanan']); ?></td>
                                        <td><?= "Rp. " . format_ribuan($data['jumlah_makanan'] * $data['harga_makanan']); ?></td>
                                        <td><a href="proses-hapuspesanan.php?kd=1&no=<?= $data['no_meja'] ?>&id=<?= $data['id_makanan']; ?>" class="btn btn-danger">Hapus Pesanan</a></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-10">
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "pesan") {
                                    echo '<div class="col-sm-10 alert alert-danger" role="alert">Anda belum membayar tagihan!</div>';
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $_SESSION['nama_pelanggan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">No Meja</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_meja" name="no_meja" value="<?= $_SESSION['no_meja']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Menu Restoran</label>
                            </div>
                            <div class="form-group row">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM makanan WHERE status=1");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card mb-3 col-lg-2">
                                        <label for="email" class="col-lg-20 col-form-label"><?= $data['nama_makanan']; ?><br><?= "Rp. " . $data['harga_makanan']; ?></label>
                                        <a href="proses-pesanmakanan.php?nama=<?= $_SESSION['nama_pelanggan']; ?>&no=<?= $_SESSION['no_meja']; ?>&id=<?= $data['id_makanan']; ?>">
                                            <img src="<?= $data['foto_makanan']; ?>" class="col-sm-17 img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM makanan WHERE status=0");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card mb-3 col-lg-2">
                                        <label for="email" class="col-lg-20 col-form-label"><?= $data['nama_makanan']; ?><br><?= "Rp. " . $data['harga_makanan']; ?></label>
                                        <a href="proses-pesanmakanan.php?nama=<?= $_SESSION['nama_pelanggan']; ?>&no=<?= $_SESSION['no_meja']; ?>&id=<?= $data['id_makanan']; ?>">
                                            <img src="<?= $data['foto_makanan']; ?>" class="col-sm-17 img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            </form>
                            <?php
                            $query2 = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_meja' AND status_makanan=1 AND status_pesanan=0");
                            $cek2 = mysqli_num_rows($query2);
                            if ($cek2 > 0) { ?>
                                <h1 class="h3 mb-4 text-gray-800">Pesanan Ready</h1>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Makanan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($data2 = mysqli_fetch_array($query2)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $data2['nama_makanan']; ?></td>
                                                <td><?= $data2['jumlah_makanan']; ?></td>
                                                <td><?= "Rp. " . format_ribuan($data2['harga_makanan']); ?></td>
                                                <td><?= "Rp. " . format_ribuan($data2['jumlah_makanan'] * $data2['harga_makanan']); ?></td>
                                                <?php $total += ($data2['jumlah_makanan'] * $data2['harga_makanan']); ?>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                        <tr>
                                            <?php
                                            $meja = mysqli_query($conn, "SELECT * FROM meja WHERE status_meja=1 AND status_nota=0 AND no_meja='$no_meja' ");
                                            $nota = mysqli_num_rows($meja);
                                            if ($nota > 0) {
                                            ?>
                                                <th scope="row"><a href="proses-pesanmakanan.php?no=<?= $no_meja ?>&sn=1&sm=1" class="btn btn-success">Nota</a></th>
                                            <?php
                                            } else {
                                            ?>
                                                <th scope="row"><button class="btn btn-secondary">Nota</a></th>
                                            <?php } ?>
                                            <th scope="row"></th>
                                            <th scope="row"></th>
                                            <th scope="row">Subtotal</th>
                                            <th scope="row"><?= "Rp. " . format_ribuan($total) ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <br><br>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>