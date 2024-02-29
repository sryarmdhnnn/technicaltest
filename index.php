<?php
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit;
}

// Jika pengguna sudah login, tampilkan halaman selamat datang
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Welcome, <?php echo $email; ?></h2>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>

</html>