<?php
include "security-Pantry.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bahan Baku</h1>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "success") {
            echo '<div class="col-sm-8 alert alert-success" role="alert">Data berhasil di simpan!</div>';
        } else {
            echo '<div class="col-sm-8 alert alert-danger" role="alert">Data gagal di simpan! silahkan cek data stok bahan baku!</div>';
        }
    }
    ?>
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
    <div class="row">
        <div class="col-lg-6">
            <form action="proses-bahanbaku.php" method="post">
                <div class="form-group">
                    <label for="current_password">Nama Bahan</label>
                    <select class="custom-select" name="id_bahan">
                        <?php
                        $stok = mysqli_query($conn, "SELECT * FROM bahan ORDER BY bahan_baku asc");
                        while ($barang = mysqli_fetch_array($stok)) {
                            ?>
                            <option value="<?= $barang['id_bahan']; ?>"><?= $barang['bahan_baku']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="new_password1">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" onkeypress="return number(event)">
                </div>
                <div class="form-group">
                    <label for="new_password2">Status Barang</label>
                    <select class="custom-select" name="status">
                        <option value="Masuk">Masuk</option>
                        <option value="Keluar">Keluar</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>