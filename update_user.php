<?php
require_once 'includes/db.php';
require_once 'classes/UserManager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $userManager = new UserManager();
    $userManager->updateUser($id, $username, $email);

    // Redirect to user profile or any other page as needed
    header("location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Update User</h2>
        <?php
        require_once 'includes/db.php';

        $id = $_GET['id']; // Ambil ID user dari URL

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = DB::getConnection()->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        ?>
            <form method="POST" action="update_user.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                <button type="submit">Update User</button>
            </form>
        <?php
        } else {
            echo "User not found";
        }
        ?>
    </div>
</body>

</html>