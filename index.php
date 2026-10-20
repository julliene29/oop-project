
<?php

require_once "database.php";
require_once "users.php";

try {
    $database = new Database();
    $db = $database->getConnection();

    // Gukora object ya users
    $user = new users($db);

    $name = "Jullienne";
    $email = "jullienne@example.com";

    if ($user->validateUser($name, $email)) {
        echo "full data.<br>";
    } else {
        echo "invalid credential.<br>";
    }

   
    //if ($user->validateUser($name, $email)) {
//if ($user->create($name, $email)) {
          //  echo "User created successfully!<br>";
       // }
    //}


    $foundUser = $user->searchUser(1);

    if ($foundUser) {
        echo "<h3>User found by ID</h3>";
        echo "ID: " . htmlspecialchars((string)$foundUser['id']) . "<br>";
        echo "Name: " . htmlspecialchars($foundUser['name']) . "<br>";
        echo "Email: " . htmlspecialchars($foundUser['email']) . "<br>";
    } else {
        echo "ID is Missing.<br>";
    }

    $allUsers = $user->getAllUsers();

    echo "<h3>All Users</h3>";

    if (count($allUsers) > 0) {
        foreach ($allUsers as $oneUser) {
            echo "ID: " . htmlspecialchars((string)$oneUser['id']) . "<br>";
            echo "Name: " . htmlspecialchars($oneUser['name']) . "<br>";
            echo "Email: " . htmlspecialchars($oneUser['email']) . "<br>";
            echo "<hr>";
        }
    } else {
        echo "user not found.";
    }

    $emailUser = $user->searchByEmail($email);

    if ($emailUser) {
        echo "<h3>User found by email</h3>";
        echo "Name: " . htmlspecialchars($emailUser['name']) . "<br>";
        echo "Email: " . htmlspecialchars($emailUser['email']) . "<br>";
    } else {
        echo "invalid email.<br>";
    }

} catch (PDOException $e) {
    echo "invalid email.<br>";
}

?>
