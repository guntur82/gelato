<?php
session_start();

include "conn.php";

$username       = $_GET['un'];
$nama_pelanggan = $_GET['np'];
$no_meja        = $_GET['nm'];
$id_makanan     = $_GET['im'];
$tanggal        = $_GET['tgl'];
$id_history     = $_GET['is'];
$id_bahan       = $_GET['ib'];
$status         = $_GET['st'];
$id_kuisioner   = $_GET['ik'];
$pelayanan      = $_GET['tp'];
$makanan        = $_GET['tm'];
$tempat         = $_GET['t'];

if ($username != null) {
    $data = "DELETE FROM user WHERE username='$username' ";
    mysqli_query($conn, $data);

    header("location:list-user.php?msg=success");
} else if ($id_kuisioner != null) {
    $data = "DELETE FROM kuisioner WHERE id_kuisioner='$id_kuisioner' AND pelayanan='$pelayanan' AND makanan='$makanan' AND tempat='$tempat' AND tanggal='$tanggal' ";
    mysqli_query($conn, $data);

    header("location:kritik.php?msg=success");
} else if ($nama_pelanggan != null) {
    $data = "DELETE FROM history_pesan WHERE nama_pelanggan='$nama_pelanggan' AND no_meja='$no_meja' AND id_makanan='$id_makanan' AND tanggal='$tanggal' ";
    mysqli_query($conn, $data);

    header("location:pesanan.php?msg=success");
} else if ($id_bahan != null) {
    $data = "DELETE FROM history_bahan WHERE id_bahan='$id_bahan' AND status='$status' AND tanggal='$tanggal' AND id_history='$id_history' ";
    mysqli_query($conn, $data);

    header("location:bahan-baku.php?msg=success");
}
