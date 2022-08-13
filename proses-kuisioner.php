<?php
session_start();

include "conn.php";

$pelayanan  = $_POST['pelayanan'];
$makanan    = $_POST['makanan'];
$tempat     = $_POST['tempat'];
$tanggal    = date("Y-m-d");
if (($pelayanan == null) || ($makanan == null) || ($tempat == null)) {
    header("location:kuisioner.php?msg=error");
} else {
    $data = mysqli_query($conn, "INSERT INTO kuisioner (pelayanan,makanan,tempat,tanggal) VALUES ('$pelayanan','$makanan','$tempat','$tanggal') ");

    header("location:kuisioner.php?msg=success");
}
