<?php
require_once 'includes/config.php';
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses login
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = DB::getConnection()->query($sql);

    if ($result->num_rows == 1) {
        // Login berhasil
        session_start();
        $_SESSION['email'] = $email;
        header("location: index.php");
    } else {
        // Login gagal
        echo "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>