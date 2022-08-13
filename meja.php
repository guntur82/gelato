<?php
include "security-Pelayan.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Meja</h1>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM meja");
    ?>
    <div class="card mb-3 col-lg-5">
        <?php
        while ($no = mysqli_fetch_array($query)) {
            ?>
            <h1 class="h3 mb-4 text-gray-800">
                Meja <?= $no['no_meja']; ?>&nbsp
                <?php
                if ($no['status_meja'] == 0) {
                    ?>
                    <a href="logout-pelanggan.php?no=<?= $no['no_meja']; ?>" class="btn btn-warning">
                        Active
                    </a>
                <?php } else { ?>
                    <a href="logout-pelanggan.php?no=<?= $no['no_meja']; ?>" class="btn btn-success">
                        Deactive
                    </a>
                <?php } ?>
            </h1>
        <?php } ?>
    </div>
    <!-- /.container-fluid -->
    <?php include "footer.php" ?>