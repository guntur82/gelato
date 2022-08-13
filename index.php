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
    <h1 class="h3 mb-4 text-gray-800"><?= $_SESSION['level']; ?></h1>

    <div class="row">
        <div class="card mb-3 col-lg-8">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $cd['image'] ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $cd['name'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include "footer.php"; ?>