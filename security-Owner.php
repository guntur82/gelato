<?php
session_start();
if ((!isset($_SESSION['username'])) || (isset($_SESSION['nama_pelanggan']))) {
    header("location:login.php");
} else if ($_SESSION['level'] != "Owner") {
    header("location:blocked.php");
} else {
    include "conn.php";
}

function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}
$level = $_SESSION['level'];
