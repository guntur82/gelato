<?php
include "security-Kuisioner.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Register</h1>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "success") {
            echo '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Data harus diisi semua!</div>';
        }
    }
    ?>
    <div class="row">
        <div class="col-lg-8">
            <form action="proses-kuisioner.php" method="POST">
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Bagaimana dengan pelayanan yang kami berikan?</label>
                </div>
                <div class="form-group row col-lg-12">
                    <input type="text" class="form-control" name="pelayanan">
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Bagaimana dengan makanan yang kami sajikan?</label>
                </div>
                <div class="form-group row col-lg-12">
                    <input type="text" class="form-control" name="makanan">
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Bagaimana dengan tempat yang kami miliki?</label>
                </div>
                <div class="form-group row col-lg-12">
                    <input type="text" class="form-control" name="tempat">
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>