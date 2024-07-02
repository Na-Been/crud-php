<?php
include_once 'db_config.php';
include_once 'User.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Instantiate user object
    $user = new User($db);

    // Set user property values
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];

    // Create the user
    if ($user->create()) {
        echo "User was created.";
    } else {
        echo "Unable to create user.";
    }
}
?>
