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

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Prepare the DELETE query
    $query = "DELETE FROM products WHERE product_id='$product_id'";

    // Run the query
    $result = $conn->query($query);
    if (!$result) {
        die($conn->error);
    }

    // Redirect back to the delete product page
    header("Location: view-product.php");
    exit();
}

?>


