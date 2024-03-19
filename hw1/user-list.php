<?php
// Include the database connection file
require_once 'login.php';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Execute SQL query to retrieve user data
$query = "SELECT * FROM users"; // Adjust this query according to your database schema
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters - User List</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('skate.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
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
            font-size: 14px; /* Adjust the font size as needed */
            font-weight: bold;
        }

        #navbar-logo {
            font-size: 1.5rem;
        }

        #user-list-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto; /* Centered the container */
            max-width: 300px; /* Set a maximum width */
        }

        a {
            color: #333;
            display: block;
            margin: 10px 0;
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
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

    <div id="user-list-container">
        <h1>Suburban Outfitters - User List</h1>
        <?php
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<a href='user-details.php?id={$row["id"]}'>{$row["forename"]} {$row["surname"]}</a>";
            }
        } else {
            echo "No users found";
        }

        // Close database connection
        $conn->close();
        ?>
        <!-- Add button to navigate to user-add.php -->
        <a href="user-add.php">Add Customer</a>
    </div>

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
