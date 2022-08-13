<?php
session_start();

include 'conn.php';

$id_bahan = $_POST['id_bahan'];
$jumlah   = $_POST['jumlah'];
$status   = $_POST['status'];
$tanggal  = date("Y-m-d");

if (($jumlah == null) || ($jumlah <= 0)) {
    header("location:bahan.php?pesan=fail");
} else {
    $data = mysqli_query($conn, "SELECT * FROM bahan WHERE id_bahan='$id_bahan' ");
    $cek = mysqli_fetch_array($data);

    if ($status == "Masuk") {
        $bahan = "UPDATE bahan SET stok=stok+$jumlah WHERE id_bahan='$id_bahan' ";
    } else {
        if ($jumlah > $cek['stok']) {
            header("location:bahan.php?pesan=fail");
        }
        $bahan = "UPDATE bahan SET stok=stok-$jumlah WHERE id_bahan='$id_bahan' ";
    }
    $input = "INSERT INTO history_bahan(id_bahan,jumlah,status,tanggal) VALUES ('$id_bahan','$jumlah','$status','$tanggal')";

    mysqli_query($conn, $bahan);
    mysqli_query($conn, $input);
    header("location:bahan.php?pesan=success");
}
