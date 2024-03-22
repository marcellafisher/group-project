<?php

$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id']; // Corrected variable name

    // Prepare the DELETE query
    $query = "DELETE FROM users WHERE user_id='$user_id'";

    // Run the query
    $result = $conn->query($query);
    if (!$result) {
        die("Error deleting user: " . $conn->error);
    } else {
        // Redirect back to the user list page
        header("Location: user-list.php");
        exit();
    }
} else {
    // If user_id is not set, redirect back to the user list page
    header("Location: user-list.php");
    exit();
}

?>

