<?php
require_once 'includes/db.php';
require_once 'classes/UserManager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    $userManager = new UserManager();
    $userManager->updatePassword($id, $password);

    // Redirect to user profile or any other page as needed
    header("location: profile.php");
}
