<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'conn.php';

$nama_pelanggan = $_GET['nama'];
$no_meja = $_GET['no'];
$id_makanan = $_GET['id'];
$status_nota = $_GET['sn'];
$status_meja = $_GET['sm'];
$tanggal = date("Y-m-d");

if ($status_nota > 0) {
    $query = mysqli_query($conn, "UPDATE meja SET status_nota='$status_nota',status_meja='$status_meja' WHERE no_meja='$no_meja' ");
} else {
    $query = mysqli_query($conn, "SELECT * FROM pesanan WHERE nama_pelanggan='$nama_pelanggan' AND no_meja='$no_meja' AND id_makanan='$id_makanan' AND status_makanan=0 AND status_pesanan=0");
    $cek = mysqli_num_rows($query);
    $query2 = mysqli_query($conn, "SELECT * FROM history_pesan WHERE nama_pelanggan='$nama_pelanggan' AND no_meja='$no_meja' AND id_makanan='$id_makanan' AND tanggal='$tanggal' AND status=0");
    $history = mysqli_num_rows($query2);


    if ($cek == 1) {
        $tambah = "UPDATE pesanan SET jumlah_makanan=jumlah_makanan+1 WHERE nama_pelanggan='$nama_pelanggan' AND no_meja='$no_meja' AND id_makanan='$id_makanan' AND status_makanan=0 AND status_pesanan=0";
    } else {
        $tambah = "INSERT INTO pesanan(nama_pelanggan,no_meja,id_makanan,jumlah_makanan,status_makanan,status_pesanan)
        VALUES ('$nama_pelanggan','$no_meja','$id_makanan','1','0','0') ";
    }
    mysqli_query($conn, $tambah);

    if ($history == 1) {
        $add = "UPDATE history_pesan SET jumlah_makanan=jumlah_makanan+1 WHERE nama_pelanggan='$nama_pelanggan' AND no_meja='$no_meja' AND id_makanan='$id_makanan' AND tanggal='$tanggal' ";
    } else {
        $add = "INSERT INTO history_pesan(nama_pelanggan,no_meja,id_makanan,jumlah_makanan,tanggal)
        VALUES ('$nama_pelanggan','$no_meja','$id_makanan','1','$tanggal') ";
    }
    mysqli_query($conn, $add);
}
header("location:pesan-meja.php");
