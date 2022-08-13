<?php
session_start();
$folder = "img/";

include "conn.php";


$username   = $_POST['username'];
$password   = md5($_POST['password']);
$nama       = $_POST['nama'];
$level      = $_POST['level'];
$sname       = "/^[a-zA-Z ]+$/";
$suser     = "/^[_a-z0-9-]+$/";
if (($nama == null) && ($password == null) && ($username == null)) {
    header("location:register.php?msg=error");
} else if (($nama == null) && ($password == null)) {
    header("location:register.php?msg=error2");
} else if (($username == null) && ($nama == null)) {
    header("location:register.php?msg=error3");
} else if (($password == null) && ($username == null)) {
    header("location:register.php?msg=error4");
} else if ($username == null) {
    header("location:register.php?msg=error5");
} else if ($password == null) {
    header("location:register.php?msg=error6");
} else if ($nama == null) {
    header("location:register.php?msg=error7");
} else {
    $data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $cek = mysqli_num_rows($data);
    if ($cek == 1) {
        header("location:register.php?msg=error8");
    } else if (!preg_match($suser, $username)) {
        header("location:register.php?msg=error11");
    } else if (!preg_match($sname, $nama)) {
        header("location:register.php?msg=error12");
    } else {
        if (!empty($_FILES['image']['tmp_name'])) {
            $image = $_FILES['image']['type'];
            if ($image == "image/jpeg" || $image == "image/jpg" || $image == "image/gif" || $image == "image/png") {
                $picture = $folder . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $picture)) {
                    $data = "INSERT INTO user(username,password,name,level,image) VALUES ('$username','$password','$nama','$level','$picture') ";
                    $sql = mysqli_query($conn, $data);
                    header("location:register.php?msg=success");
                } else {
                    //gambar gagal dikirim
                    header("location:register.php?msg=error9");
                }
            } else {
                //gambar bukan bertype jpg,gif,png
                header("location:register.php?msg=error10");
            }
        } else {
            $picture = 'img/default.jpg';
            $data = "INSERT INTO user(username,password,name,level,image) VALUES ('$username','$password','$nama','$level','$picture') ";
            $sql = mysqli_query($conn, $data);
            header("location:register.php?msg=success");
        }
    }
}
