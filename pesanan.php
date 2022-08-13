<?php
include "security-Owner.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">History Pesanan</h1>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "success") {
            echo '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>';
        }
    }
    ?>
    <div class="card mb-3 col-lg-9">
        <?php
        $stok = mysqli_query($conn, "SELECT * FROM history_pesan INNER JOIN makanan WHERE history_pesan.id_makanan = makanan.id_makanan ORDER BY tanggal desc");
        ?>
        <table id="dataTable" class="table table-borderless fa-fw">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">Makanan</th>
                    <th scope="col">Jumlah Makanan</th>
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
                        <td><?= $barang['nama_pelanggan']; ?></td>
                        <td><?= $barang['no_meja']; ?></td>
                        <td><?= $barang['nama_makanan']; ?></td>
                        <td><?= $barang['jumlah_makanan']; ?></td>
                        <td><?= $barang['tanggal']; ?></td>
                        <td><a href="hapus.php?np=<?= $barang['nama_pelanggan']; ?>&nm=<?= $barang['no_meja']; ?>&im=<?= $barang['id_makanan']; ?>&tgl=<?= $barang['tanggal']; ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php
                    $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
<?php include "footer.php"; ?>