<?php
$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

// Establishing database connection
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the inventory_id is set in the URL
if (isset($_GET['inventory_id'])) {
    $inventory_id = $_GET['inventory_id'];

    // Prepare a delete statement
    $stmt = $conn->prepare("DELETE FROM inventory WHERE inventory_id = ?");
    $stmt->bind_param("i", $inventory_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to view-inventory.php with a success message
        header("Location: view-inventory.php?msg=Inventory item deleted successfully.");
    } else {
        // Redirect to view-inventory.php with an error message
        header("Location: view-inventory.php?error=Error deleting inventory item.");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to view-inventory.php if inventory_id not set
    header("Location: view-inventory.php?error=No inventory item specified for deletion.");
}
?>

