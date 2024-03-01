<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'technicaltest');

$username = stripslashes($_POST['username']);
$password = md5($_POST['password']);
$query = "SELECT * FROM user where username='$username' and password = '$password'";
$row = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);


if ($cek > 0) {
    if ($data['role'] == 'admin') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_user'] = $data['id_user'];
        header('location:admin');
    } else if ($data['role'] == 'kasir') {
        $_SESSION['role'] = 'kasir';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_user'] = $data['id_user'];
        header('location:kasir');
    } else if ($data['role'] == 'owner') {
        $_SESSION['role'] = 'owner';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_user'] = $data['id_user'];
        header('location:owner');
    }
} else {
    $msg = 'username Atau Password Salah';
    header('location:index.php?msg=' . $msg);
}
