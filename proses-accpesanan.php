<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'conn.php';

$no_meja = $_GET['no'];
$nama_pelanggan = $_GET['nm'];
$id_makanan = $_GET['id'];
$jumlah_makanan = $_GET['jml'];
$status_makanan = $_GET['sm'];
$status_pesanan = $_GET['sp'];
$tanggal = date("Y-m-d");

if (($status_makanan == 0) && ($status_pesanan == 0)) {
    $query = mysqli_query($conn, "SELECT * FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=0 AND status_pesanan=1 ");
    $cek = mysqli_num_rows($query);
    $query2 = mysqli_query($conn, "SELECT * FROM bahan_buku");
    $data = mysqli_fetch_array($query2);
    $query3 = mysqli_query($conn, "SELECT * FROM history_pesan WHERE nama_pelanggan='$nama_pelanggan' AND no_meja='$no_meja' AND id_makanan='$id_makanan' AND tanggal='$tanggal' nama_pelanggan='$nama_pelanggan' AND status=1");
    $history = mysqli_num_rows($query3);

    if ($cek == 1) {
        $tambah = "UPDATE pesanan SET jumlah_makanan=jumlah_makanan+$jumlah_makanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=0 AND status_pesanan=1";
        $hapus = "DELETE FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=0 AND status_pesanan=0 ";
    } else {
        $tambah = "UPDATE pesanan SET status_pesanan=1 WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND status_makanan=0";
    }
    //tinggal di check saja fungsinya
    if ($history == 1) {
        $tambah2 = "UPDATE history_pesan SET jumlah_makanan=jumlah_makanan+$jumlah_makanana WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND tanggal='$tanggal' AND status=1 ";
        $hapus2 = "DELETE FROM history_pesan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND tanggal='$tanggal' AND status=0 ";
    } else {
        $tambah2 = "UPDATE history_pesan SET status=1 WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' jumlah_makanan='$jumlah_makanan' AND nama_pelanggan='$nama_pelanggan' tanggal='$tanggal' ";
    }

    $bahan = "UPDATE bahan INNER JOIN bahan_baku SET stok=stok-$jumlah_makanan*jumlah_pakai WHERE bahan.id_bahan=bahan_baku.id_bahan AND bahan_baku.id_makanan='$id_makanan' ";
    mysqli_query($conn, $tambah);
    mysqli_query($conn, $bahan);
    mysqli_query($conn, $hapus);
    mysqli_query($conn, $tambah2);
    mysqli_query($conn, $hapus2);
    header("location:p-pesanan.php?pesan=success");
} else if (($status_makanan == 0) && ($status_pesanan == 1)) {
    $query = mysqli_query($conn, "SELECT * FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=1 AND status_pesanan=1 ");
    $cek = mysqli_num_rows($query);

    if ($cek == 1) {
        $tambah = "UPDATE pesanan SET jumlah_makanan=jumlah_makanan+$jumlah_makanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=1 AND status_pesanan=1";
        $hapus = "DELETE FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=0 AND status_pesanan=1 ";
    } else {
        $tambah = "UPDATE pesanan SET status_makanan=1 WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_pesanan=1";
    }
    mysqli_query($conn, $tambah);
    mysqli_query($conn, $hapus);
    header("location:makanan.php?pesan=success");
} else if (($status_makanan == 1) && ($status_pesanan == 1)) {
    $query = mysqli_query($conn, "SELECT * FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=1 AND status_pesanan=0 ");
    $cek = mysqli_num_rows($query);

    if ($cek == 1) {
        $tambah = "UPDATE pesanan SET jumlah_makanan=jumlah_makanan+$jumlah_makanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=1 AND status_pesanan=0";
        $hapus = "DELETE FROM pesanan WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=1 AND status_pesanan=1 ";
    } else {
        $tambah = "UPDATE pesanan SET status_pesanan=0 WHERE no_meja='$no_meja' AND id_makanan='$id_makanan' AND nama_pelanggan='$nama_pelanggan' AND status_makanan=1 ";
    }
    mysqli_query($conn, $tambah);
    mysqli_query($conn, $hapus);
    header("location:p-pesanan.php?pesan=success");
}
