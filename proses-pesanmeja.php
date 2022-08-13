<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'conn.php';

// menangkap data yang dikirim dari form login
$no_meja = $_POST['no_meja'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$name = "/^[a-zA-Z ]+$/";

// menyeleksi data user dengan username dan password yang sesuai

$kondisi = mysqli_query($conn, "SELECT * FROM meja WHERE no_meja='$no_meja' AND status_meja='0' ");
$cek = mysqli_num_rows($kondisi);


// cek apakah username dan password di temukan pada database
if ($nama_pelanggan == null) {
    header("location:login.php?status=kosong");
} else if (!preg_match($name, $nama_pelanggan)) {
    header("location:login.php?status=salah");
} else {
    if ($cek == 1) {
        $query = "UPDATE meja SET status_meja='1' WHERE no_meja='$no_meja'";
        mysqli_query($conn, $query);

        $_SESSION['nama_pelanggan'] = $nama_pelanggan;
        $_SESSION['no_meja'] = $no_meja;
        header("location:pesan-meja.php");
    } else {
        header("location:login.php?status=digunakan");
    }
}
