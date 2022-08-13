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
    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "error1") {
            echo '<div class="alert alert-danger col-lg-6" role="alert">Password lama anda salah!</div>';
        } else if ($_GET['msg'] == "error2") {
            echo '<div class="alert alert-danger col-lg-6" role="alert">Password baru anda tidak boleh sama dengan yang lama!</div>';
        } else if ($_GET['msg'] == "error3") {
            echo '<div class="alert alert-danger col-lg-6" role="alert">Tolong periksa kembali password baru anda!</div>';
        } else if ($_GET['msg'] == "success") {
            echo '<div class="alert alert-success col-lg-6" role="alert">Password berhasil diperbaharui!</div>';
        }
    }
    ?>
    <div class="row">
        <div class="col-lg-6">
            <form action="proses-edit.php" method="POST">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                </div>
                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                </div>
                <input type="hidden" name="username" value="<?= $cd['username']; ?>">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->


<?php include "footer.php"; ?>