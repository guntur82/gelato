<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include "conn.php";
function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}
$level = $_SESSION['level'];

include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "error1") {
            echo '<div class="alert alert-danger" role="alert">Gambar gagal dikirim!</div>';
        } else if ($_GET['msg'] == "error2") {
            echo '<div class="alert alert-danger" role="alert">Gambar harus berformat jpeg,gif,png</div>';
        } else if ($_GET['msg'] == "success") {
            echo '<div class="alert alert-success" role="alert">Profile diperbaharui!</div>';
        }
    }
    ?>
    <div class="row">
        <div class="col-lg-8">
            <form action="proses-edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $cd['username']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $cd['name']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= $cd['image']; ?>" class="img-thumbnail" id="preview">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" onchange="tampilkanPreview(this,'preview')">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "footer.php"; ?>