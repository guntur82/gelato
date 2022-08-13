<?php
session_start();
$folder = "img/";

include "conn.php";


$username           = $_POST['username'];
$nama               = $_POST['nama'];
$current_password   = md5($_POST['current_password']);
$new_password1      = md5($_POST['new_password1']);
$new_password2      = md5($_POST['new_password2']);

if ($nama != null) {
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = $_FILES['image']['type'];
        if ($image == "image/jpeg" || $image == "image/jpg" || $image == "image/gif" || $image == "image/png") {
            $picture = $folder . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $picture)) {
                $data = "UPDATE user SET name='$nama', image='$picture' WHERE username='$username' ";
                $sql = mysqli_query($conn, $data);
                header("location:edit-profile.php?msg=success");
            } else {
                //gambar gagal dikirim
                header("location:edit-profile.php?msg=error1");
            }
        } else {
            //gambar bukan bertype jpg,gif,png
            header("location:edit-profile.php?msg=error2");
        }
    } else {
        $data = "UPDATE user SET name='$nama' WHERE username='$username' ";
        $sql = mysqli_query($conn, $data);
        header("location:edit-profile.php?msg=success");
    }
} else {
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $data = mysqli_fetch_array($sql);
    if ($data['password'] != $current_password) {
        header("location:edit-password.php?msg=error1");
    } else if ($data['password'] == $new_password1) {
        header("location:edit-password.php?msg=error2");
    } else if ($new_password1 != $new_password2) {
        header("location:edit-password.php?msg=error3");
    } else {
        $update = mysqli_query($conn, "UPDATE user SET password='$new_password1' WHERE username='$username' ");
        header("location:edit-password.php?msg=success");
    }
}
