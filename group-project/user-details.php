<?php
// Include the database connection file
require_once 'login.php';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Check if the user ID is set in the URL
if(isset($_GET['user_id'])) {
    // Sanitize the user ID input
    $user_id = $conn->real_escape_string($_GET['user_id']);

    // Execute SQL query to retrieve user details
    $query = "SELECT * FROM users WHERE user_id = $user_id"; // Adjust this query according to your database schema
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result->num_rows == 1) {
        // Fetch user details
        $user = $result->fetch_assoc();
    } else {
        // Display message if user not found
        echo "<p>User not found.</p>";
    }
} else {
    // Display message if user ID is not set
    echo "<p>User ID not provided.</p>";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters - Customer Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('models.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
            font-weight: bold;
        }

        #navbar-logo {
            font-size: 1.5rem;
        }

        #user-details-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin-top: 20px; /* Adjusted margin-top */
        }

        #user-details-container p {
            margin-bottom: 10px;
        }

        a {
            color: #333;
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="about.php">About</a>
            <a href="login-form.php">Login</a>
            <a href="user-list.php">User List</a>
            <a href="user-add.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <a href="return.php">Return</a>
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

    <div id="user-details-container">
        <h1>Suburban Outfitters - Customer Details</h1>
        <!-- Display details of the selected customer -->
        <?php
        if(isset($user)) {
            echo "<p>Username: {$user['username']}</p>";
            echo "<p>Customer Name: {$user['forename']} {$user['surname']}</p>";
            echo "<p>Shirt Size: {$user['shirt_size']}</p>";
            echo "<p>Pant Size: {$user['pant_size']}</p>";
            echo "<p>Shoe Size: {$user['shoe_size']}</p>";
            echo "<p>Address: {$user['address']}</p>";
        } else {
            echo "<p>User details not available.</p>";
        }
        ?>
        <!-- Add a link to go back to user-list.php -->
        <a href="user-list.php">Back to User List</a>
    </div>

    <!-- Footer Section -->
    <footer>
        <div id="footer-container">
            <div id="contact-footer">
                <h2>Contact Us</h2>
                <p>Email: info@suburbanoutfitters.com</p>
                <p>Phone: (555) 123-4567</p>
            </div>
            <div id="copyright">
                <p>&copy; 2024 SUBURBAN OUTFITTERS Retail, LLC. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
