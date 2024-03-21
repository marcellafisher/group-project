<?php

$page_roles=array('admin');


// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters - Delete Product</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            background: url('concrete.avif') no-repeat center center fixed;
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

        #delete-user-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin: auto; /* Center the container */
            margin-top: 20px; /* Add space between navbar and container */
        }

        form {
            margin-top: 20px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
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
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

 <div id="delete-product-container">
        <h1>Delete Product</h1>
        <p>Select the product to delete:</p>
        <!-- Form for deleting product -->
        <form action="process-delete-product.php" method="post">
            <?php
            // Include the database connection file
            require_once 'login.php';

            // Fetch products from the database
            $query = "SELECT product_id, name FROM products";
            $result = $conn->query($query);

            // Check if products are found
            if ($result->num_rows > 0) {
                // Output radio buttons for each product
                while ($row = $result->fetch_assoc()) {
                    echo "<label for='product_" . $row['product_id'] . "'>" . $row['name'] . "</label>";
                    echo "<input type='radio' id='product_" . $row['product_id'] . "' name='product_id' value='" . $row['product_id'] . "'><br>";
                }
            } else {
                echo "<p>No products found</p>";
            }
            ?>
            <button type="submit" name="delete">Delete Product</button>
        </form>
        <a href="order.php">Cancel</a>
    </div>

    
        <footer>        <div id="footer-container">
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

