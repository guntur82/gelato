<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'conn.php';

$no_meja = $_GET['no'];
$id_makanan = $_GET['id'];
$kd = $_GET['kd'];
$tanggal = date("Y-m-d");

// menyeleksi data user dengan username dan password yang sesuai
$query = "DELETE FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND status_makanan=0 ";
mysqli_query($conn, $query);
$query2 = "DELETE FROM history_pesan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND tanggal='$tanggal' AND status=0 ";
mysqli_query($conn, $query2);

if ($kd == 1) {
    header("location:pesan-meja.php");
} else {
    header("location:p-pesanan.php");
}
