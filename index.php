
<?php

require_once "database.php";
require_once "users.php";

try {
    // Connect to database
    $database = new Database();
    $db = $database->getConnection();

    // Create users object
    $user = new users($db);

    echo "Enter your name: ";
    $name = trim(readline());

    echo "Enter your email: ";
    $email = trim(readline());

    if (!$user->validateUser($name, $email)) {
        echo "Invalid name or email.\n";
        exit;
    }

    // Save user to database
    if ($user->create($name, $email)) {
        echo "User created successfully!\n";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}

?>
