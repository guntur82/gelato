<?php
include "security-Owner.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Register</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- untuk upload gambar menggunakan enctype -->
            <form action="proses-register.php" method="POST" enctype="multipart/form-data">
                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "error8") {
                        echo '<div class="alert alert-danger" role="alert">Username sudah digunakan!</div>';
                    } else if ($_GET['msg'] == "error9") {
                        echo '<div class="alert alert-danger" role="alert">Gambar gagal dikirim!</div>';
                    } else if ($_GET['msg'] == "error10") {
                        echo '<div class="alert alert-danger" role="alert">Format gambar salah!</div>';
                    } else if ($_GET['msg'] == "success") {
                        echo '<div class="alert alert-success" role="alert">Account berhasil di buat!</div>';
                    }
                }
                ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username">
                        <?php
                        if (isset($_GET['msg'])) {
                            if (($_GET['msg'] == "error") || ($_GET['msg'] == "error3") || ($_GET['msg'] == "error4") || ($_GET['msg'] == "error5")) {
                                echo '<small class="text-danger">Username harus diisi!</small>';
                            } else if ($_GET['msg'] == "error11") {
                                echo '<small class="text-danger">Username ini tidak bisa di gunakan!</small>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                        <?php
                        if (isset($_GET['msg'])) {
                            if (($_GET['msg'] == "error") || ($_GET['msg'] == "error2") || ($_GET['msg'] == "error4") || ($_GET['msg'] == "error6")) {
                                echo '<small class="text-danger">Password harus diisi!</small>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?php
                        if (isset($_GET['msg'])) {
                            if (($_GET['msg'] == "error") || ($_GET['msg'] == "error2") || ($_GET['msg'] == "error3") || ($_GET['msg'] == "error7")) {
                                echo '<small class="text-danger">Nama harus diisi!</small>';
                            } else if ($_GET['msg'] == "error12") {
                                echo '<small class="text-danger">Nama ini tidak bisa digunakan!</small>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="level" name="level">
                            <option value="Pelayan">Pelayan</option>
                            <option value="Koki">Koki</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Pantry">Pantry</option>
                            <option value="Customer-service">Customer-service</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Picture</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" id="image" name="image" onchange="tampilkanPreview(this,'preview')">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <img class="img-thumbnail" id="preview" src="" alt="" width="320px" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Register Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>