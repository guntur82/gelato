<?php
include "security-Owner.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kritik & Saran</h1>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "success") {
            echo '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>';
        }
    }
    ?>
    <div class="card mb-3 col-lg-9">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM kuisioner ORDER BY tanggal desc");
        ?>
        <table id="dataTable" class="table table-borderless fa-fw">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tentang Pelayanan</th>
                    <th scope="col">Tentang Makanan</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $data['pelayanan']; ?></td>
                        <td><?= $data['makanan']; ?></td>
                        <td><?= $data['tempat']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><a href="hapus.php?ik=<?= $data['id_kuisioner']; ?>&tp=<?= $data['pelayanan']; ?>&tm=<?= $data['makanan']; ?>&t=<?= $data['tempat']; ?>&tgl=<?= $data['tanggal']; ?>" class="btn btn-danger">Hapus</a></td>
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