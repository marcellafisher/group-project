<?php

$page_roles = array('admin','customer');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Return - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('ppl.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
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
            width: 100%;
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

        #view-return-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            max-width: 300px;
        }

        p {
            margin: 10px 0;
        }

        a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="about.php">About</a>
            <a href="authenticate.php">Login</a>
            <a href="user-list.php">User List</a>
            <a href="user-add.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <a href="return.php">Return</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div id="view-return-container">
        <?php
        // Include the database connection file
        require_once 'login.php';

        $conn = new mysqli($hn, $un, $pw, $db);

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

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
                
                // Add buttons to go to edit-return and cancel-return
                echo "<a href='edit-return.php?return_id=$return_id'><button>Edit Return</button></a>";
                echo "<a href='cancel-return.php?return_id=$return_id'><button>Cancel Return</button></a>";
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
        <a href="return.php">Back to Returns</a>
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
