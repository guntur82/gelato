<?php
session_start();

include "conn.php";

$no_meja = $_GET['no'];
$kd = $_GET['kd'];

$query = mysqli_query($conn, "SELECT * FROM meja WHERE no_meja='$no_meja' AND status_meja=1");
$data = mysqli_fetch_array($query);



if ($kd == 1) {
    if ($data > 0) {
        $update = "UPDATE meja SET status_meja=0, status_nota=0 WHERE no_meja='$no_meja' ";
        $delete = "DELETE FROM pesanan WHERE no_meja='$no_meja' ";
    } else {
        // tidak perlu digunakan
        $update = "UPDATE meja SET status_meja=1, status_nota=0 WHERE no_meja='$no_meja' ";
    }
    mysqli_query($conn, $update);
    mysqli_query($conn, $delete);
    header("location:logout.php");
} else if ($kd == 2) {
    $update = "UPDATE meja SET status_nota=0 WHERE no_meja='$no_meja' ";
    $delete = "DELETE FROM pesanan WHERE no_meja='$no_meja' ";
    mysqli_query($conn, $update);
    mysqli_query($conn, $delete);
    header("location:p-pesanan.php");
} else {
    if ($data > 0) {
        $update = "UPDATE meja SET status_meja=0, status_nota=0 WHERE no_meja='$no_meja' ";
        $delete = "DELETE FROM pesanan WHERE no_meja='$no_meja' ";
    } else {
        $update = "UPDATE meja SET status_meja=1, status_nota=0 WHERE no_meja='$no_meja' ";
    }
    mysqli_query($conn, $update);
    mysqli_query($conn, $delete);
    header("location:meja.php");
}
