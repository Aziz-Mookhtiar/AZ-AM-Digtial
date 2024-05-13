<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = sanitizeInput($_POST["fullName"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);

    // Save data to a file or database (you may want to use a database for a real application)
    saveUserData($fullName, $email, $password);

    // Welcome the user
    echo "Welcome, $fullName! Your account has been created successfully.";
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveUserData($fullName, $email, $password) {
    // In a real application, you should store this data securely in a database
    // For simplicity, let's save it to a file in this example

    $userData = "$fullName, $email, $password\n";
    file_put_contents("user_data.txt", $userData, FILE_APPEND | LOCK_EX);
}
?>
