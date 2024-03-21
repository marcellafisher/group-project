<?php
// Include the database connection file
require_once 'login.php';

// Check if return ID is provided
if(isset($_GET['return_id'])) {
    // Get the return ID from the URL
    $return_id = $_GET['return_id'];

    // Fetch return data from the database
    $query = "SELECT * FROM returns WHERE return_id = $return_id";
    $result = $conn->query($query);

    // Check if return data is found
    if($result->num_rows == 1) {
        // Fetch return details
        $return = $result->fetch_assoc();
    } else {
        // Return not found
        echo "<p>Return not found.</p>";
        exit(); // Stop further execution
    }
} else {
    // Return ID not provided
    echo "<p>Return ID not provided.</p>";
    exit(); // Stop further execution
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $returnDate = $_POST['returnDate'];
    $returnQuantity = $_POST['returnQuantity'];
    
    // Update return data in the database
    $update_query = "UPDATE returns SET date = '$returnDate', quantity = $returnQuantity WHERE return_id = $return_id";
    $update_result = $conn->query($update_query);

    // Check if update was successful
    if ($update_result) {
        // Redirect to return.php after successful update
        header("Location: return.php");
        exit();
    } else {
        // Display error message if update fails
        echo "Error updating return: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Return - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
    <header>
        <nav>
            <!-- Your navigation links here -->
        </nav>
    </header>

    <div id="edit-return-container">
        <h1>Edit Return</h1>
        <!-- Form for editing return -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?return_id=" . $return_id); ?>" method="post">
            <label for="return-date">Return Date:</label>
            <input type="date" id="return-date" name="returnDate" value="<?php echo $return['date']; ?>" required>

            <label for="return-quantity">Quantity:</label>
            <input type="number" id="return-quantity" name="returnQuantity" value="<?php echo $return['quantity']; ?>" required>

            <button type="submit">Update Return</button>
        </form>
        <a href="return.php">Cancel</a>
    </div>

    <footer>
        <!-- Your footer content here -->
    </footer>
</body>

</html>

