<?php
require_once 'includes/db.php';
require_once 'classes/UserManager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $userManager = new UserManager();
    $userManager->deleteUser($id);

    // Redirect to user list or any other page as needed
    header("location: list_user.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Delete User</h2>
        <?php
        require_once 'includes/db.php';

        $id = $_GET['id']; // Ambil ID user dari URL

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = DB::getConnection()->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        ?>
            <p>Are you sure you want to delete user '<?php echo $row['username']; ?>'?</p>
            <form method="POST" action="delete_user.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit">Delete</button>
                <a href="list_user.php">Cancel</a>
            </form>
        <?php
        } else {
            echo "User not found";
        }
        ?>
    </div>
</body>

</html>