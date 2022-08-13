<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'conn.php';

// menangkap data yang dikirim dari form login
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
if (($username == null) && ($password == null)) {
    header("location:login.php?pesan=gagal4");
} else if ($password == null) {
    header("location:login.php?pesan=gagal3");
} else if ($username == null) {
    header("location:login.php?pesan=gagal2");
} else {
    $login = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek == 1) {

        $data = mysqli_fetch_array($login);


        if ($data['level'] == "Pelayan") {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['level'] = $data['level'];
        } else if ($data['level'] == "Koki") {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['level'] = $data['level'];
        } else if ($data['level'] == "Kasir") {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['level'] = $data['level'];
        } else if ($data['level'] == "Pantry") {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['level'] = $data['level'];
        } else if ($data['level'] == "Owner") {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['level'] = $data['level'];
        } else if ($data['level'] == "Customer-service") {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['level'] = $data['level'];
        } else {

            // alihkan ke halaman login kembali
            header("location:login.php?pesan=gagal");
        }
        header("location:test/..");
    } else {
        header("location:login.php?pesan=gagal");
    }
}
