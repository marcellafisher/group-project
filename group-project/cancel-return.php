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

if (isset($_POST['return_id'])) {
    $return_id = $_POST['return_id']; // Corrected variable name

    // Prepare the DELETE query
    $query = "DELETE FROM returns WHERE return_id='$return_id'";

    // Run the query
    $result = $conn->query($query);
    if (!$result) {
        die("Error deleting return: " . $conn->error);
    } else {
        // Redirect back to the view return page
        header("Location: view-return.php");
        exit();
    }
} else {
    // If return_id is not set, redirect back to the view return page
    header("Location: view-return.php");
    exit();
}

?>



