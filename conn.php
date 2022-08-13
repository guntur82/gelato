<?php
$conn = mysqli_connect("localhost", "root", "", "gelato");

//cek koneksi
if (mysqli_connect_errno()) {
    echo "Login gagal :" . mysqli_connect_error();
}
