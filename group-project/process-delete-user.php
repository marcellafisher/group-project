<?php
// Include the database connection file
require_once 'login.php';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in and their ID is set in the session
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login-form.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Delete the user from the database
$query = "DELETE FROM users WHERE id = $user_id";

if ($conn->query($query) === TRUE) {
    // Delete successful, redirect to login page
    session_unset();
    session_destroy();
    header("Location: login-form.php");
    exit();
} else {
    // Error occurred while deleting user
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>


