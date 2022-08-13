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
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE level != 'Owner' ORDER BY username ");
        ?>
        <table id="dataTable" class="table table-borderless fa-fw">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Foto</th>
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
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['name']; ?></td>
                        <td><?= $data['level']; ?></td>
                        <td><img src="<?= $data['image']; ?>" class="img-thumbnail" width="90px"></td>
                        <td><a href="hapus.php?un=<?= $data['username'] ?>" class="btn btn-danger">Hapus</a></td>
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