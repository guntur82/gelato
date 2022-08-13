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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nota</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <?php
    $no_meja = $_GET['no'];
    $total = 0;
    $query2 = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_meja' AND status_makanan=1 AND status_pesanan=0");
    $cek = mysqli_num_rows($query2);
    ?>
    <div class="card mb-3 col-lg-9">
        <?php
        if ($cek > 0) { ?>
            <h1 class="h3 mb-4 text-gray-800">Nota Meja No <?= $no_meja; ?></h1>
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
                        <th scope="row">Subtotal</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?= "Rp. " . format_ribuan($total) ?></th>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>