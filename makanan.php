<?php
include "security-Koki.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bahan Baku</h1>
    <table id="dataTable" class="table table-borderless fa-fw col-lg-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Bahan Baku</th>
                <th scope="col">Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stok = mysqli_query($conn, "SELECT * FROM bahan ORDER BY stok,bahan_baku asc");
            $i = 1;
            while ($barang = mysqli_fetch_array($stok)) {
                if ($barang['stok'] < 10) {
                    ?>
                    <tr class="col-sm-10 alert alert-danger">
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $barang['bahan_baku']; ?></td>
                        <td><?= $barang['stok']; ?></td>
                    </tr>
                <?php
            } else {
                ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $barang['bahan_baku']; ?></td>
                        <td><?= $barang['stok']; ?></td>
                    </tr>
                <?php }
            $i++;
        } ?>
        </tbody>
    </table>
    <h1 class="h3 mb-4 text-gray-800">Pesanan</h1>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM meja WHERE status_meja=1");
    while ($no = mysqli_fetch_array($query)) {
        $no_meja = $no['no_meja'];
        $total = 0;
        $query2 = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_meja' AND status_makanan=0 AND status_pesanan=1");
        $cek = mysqli_num_rows($query2);
        if ($cek > 0) { ?>
            <div class="card mb-3 col-lg-9">
                <h1 class="h3 mb-2 text-gray-800">Pesanan Meja <?= $no['no_meja']; ?></h1>
                <table class="table table-borderless fa-fw">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Makanan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($data = mysqli_fetch_array($query2)) {
                            ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $data['nama_makanan']; ?></td>
                                <td><?= $data['jumlah_makanan']; ?></td>
                                <td>
                                    <a href="proses-accpesanan.php?no=<?= $data['no_meja'] ?>&id=<?= $data['id_makanan']; ?>&jml=<?= $data['jumlah_makanan']; ?>&sm=<?= $data['status_makanan'] ?>&sp=<?= $data['status_pesanan']; ?>&nm=<?= $data['nama_pelanggan']; ?>" class="btn btn-success">Masakan Siap</a>
                                </td>
                            </tr>
                            <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>