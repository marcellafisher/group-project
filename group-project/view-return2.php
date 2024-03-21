<?php
// Include the database connection file
require_once 'login.php';

// Check if return ID is set in the URL
if (isset($_GET['return_id'])) {
    // Sanitize the return ID input
    $return_id = $conn->real_escape_string($_GET['return_id']);

    // Prepare and execute SQL query to fetch return details
    $query = "SELECT * FROM returns WHERE return_id = $return_id";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result->num_rows == 1) {
        // Fetch return details
        $return = $result->fetch_assoc();

        // Output return details
        echo "<h1>Return Details</h1>";
        echo "<p>Return ID: {$return['return_id']}</p>";
        echo "<p>Order ID: {$return['order_id']}</p>";
        echo "<p>Date: {$return['date']}</p>";
        echo "<p>Quantity: {$return['quantity']}</p>";
    } else {
        // Display message if return not found
        echo "<p>Return not found.</p>";
    }
} else {
    // Display message if return ID is not set
    echo "<p>Return ID not provided.</p>";
}

// Close database connection
$conn->close();
?>

