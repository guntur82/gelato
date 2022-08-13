<?php
include "security-Kasir.php";
include "header.php";
include "menu-$level.php";
include "topbar.php"
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kasir</h1>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM meja WHERE status_meja=1");
    while ($no = mysqli_fetch_array($query)) {
        $no_meja = $no['no_meja'];
        $total = 0;
        $query2 = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_meja' AND status_makanan=1 AND status_pesanan=0");
        $cek = mysqli_num_rows($query2);
        if ($cek > 0) { ?>
            <div class="card mb-3 col-lg-9">
                <h1 class="h3 mb-2 text-gray-800">Nota Meja No <?= $no['no_meja']; ?></h1>
                <table class="table table-borderless fa-fw">
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
                        while ($data = mysqli_fetch_array($query2)) {
                            ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $data['nama_makanan']; ?></td>
                                <td><?= $data['jumlah_makanan']; ?></td>
                                <td><?= "Rp. " . format_ribuan($data['harga_makanan']); ?></td>
                                <td><?= "Rp. " . format_ribuan($data['jumlah_makanan'] * $data['harga_makanan']); ?></td>
                                <?php $total += ($data['jumlah_makanan'] * $data['harga_makanan']); ?>
                            </tr>
                            <?php $i++;
                        } ?>
                        <tr>
                            <th scope="row">
                                <?php
                                $faktur = mysqli_query($conn, "SELECT * FROM meja WHERE status_nota=1 ");
                                if ($nota = mysqli_num_rows($faktur) > 0) {
                                    ?>
                                    <a class="btn btn-warning" href="print.php?no=<?= $no_meja; ?>">Print Nota</a>
                                <?php } else { ?>
                                    <button class="btn btn-secondary">Print Nota</a>
                                    <?php } ?>
                            </th>
                            <th></th>
                            <th></th>
                            <th>Subtotal</th>
                            <th><?= "Rp. " . format_ribuan($total) ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>