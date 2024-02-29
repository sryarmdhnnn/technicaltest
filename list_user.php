<?php
require_once 'includes/db.php';

$sql = "SELECT * FROM users";
$result = DB::getConnection()->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Username: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>List User</h2>
        <form method="GET" action="">
            <input type="text" name="email_filter" placeholder="Filter by Email">
            <button type="submit">Filter</button>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php
            require_once 'includes/db.php';

            // Filter data berdasarkan email jika disediakan
            $emailFilter = isset($_GET['email_filter']) ? $_GET['email_filter'] : '';
            $sql = "SELECT * FROM users";
            if (!empty($emailFilter)) {
                $sql .= " WHERE email LIKE '%$emailFilter%'";
            }

            $result = DB::getConnection()->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>