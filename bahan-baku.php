<?php
include "security-Owner.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">History Bahan baku</h1>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "success") {
            echo '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>';
        }
    }
    ?>
    <div class="card mb-3 col-lg-8">
        <?php
        $stok = mysqli_query($conn, "SELECT * FROM history_bahan INNER JOIN bahan WHERE history_bahan.id_bahan = bahan.id_bahan ORDER BY tanggal desc");
        ?>
        <table id="dataTable" class="table table-borderless fa-fw">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bahan Baku</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($barang = mysqli_fetch_array($stok)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $barang['bahan_baku']; ?></td>
                        <td><?= $barang['jumlah']; ?></td>
                        <td><?= $barang['status']; ?></td>
                        <td><?= $barang['tanggal']; ?></td>
                        <td><a href="hapus.php?is=<?= $barang['id_history']; ?>&ib=<?= $barang['id_bahan']; ?>&st=<?= $barang['status']; ?>&tgl=<?= $barang['tanggal']; ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php
                    $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>