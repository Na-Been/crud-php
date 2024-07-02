<?php
include_once 'db_config.php';
include_once 'User.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate user object
$user = new User($db);

// Create a new user
$user->name = "John Doe";
$user->email = "john@example.com";
if($user->create()) {
    echo "User was created.<br>";
}

// Read all users
$stmt = $user->read();
$num = $stmt->rowCount();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "ID: {$id} - Name: {$name} - Email: {$email}<br>";
    }
}

// Update a user
$user->id = 1;
$user->name = "John Smith";
$user->email = "johnsmith@example.com";
if ($user->update()) {
    echo "User was updated.<br>";
}

// Delete a user
$user->id = 1;
if ($user->delete()) {
    echo "User was deleted.<br>";
}
?>
