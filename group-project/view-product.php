<?php

$page_roles = array('admin','customer');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);


echo <<<_END


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('sun.jpeg') no-repeat center center fixed;
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
            font-size: 14px;
            font-weight: bold;
        }

        #product-list-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            max-width: 600px;
        }

        .product-item {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        form {
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
        
         #admin-options {
            position: fixed;
            bottom: 70px; /* Adjust this value to move the box up or down */
            right: 20px; /* Adjust this value to move the box left or right */
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
        }
        #admin-options a {
            display: block;
            margin-bottom: 5px;
        }
        
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="about.php">About</a>
            <a href="authenticate.php">Login</a>
            <a href="user-list.php">User List</a>
            <a href="add-user.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <a href="return.php">Return</a>
            <a href="cart.php">Cart</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div id="product-list-container">
        <h1>Product List - Suburban Outfitters</h1>
_END;



$query = "SELECT * FROM products";
$result = $conn->query($query);
if (!$result) die($conn->error);

$rows = $result->num_rows;
for ($j = 0; $j < $rows; $j++) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_BOTH);

    echo <<<_END
    <div class="product-item">
        <p>Product ID: $row[product_id]</p>
        <p>Name:<a href='edit-product.php?product_id=$row[product_id]'> $row[name]</a> </p> 
        <p>Price: $row[price]</p>
        <form action="add-to-cart.php" method="post">
            <input type="hidden" name="product_id" value="$row[product_id]">
            <input type="submit" value="Add to Cart">
        </form>
         <form action="delete-product.php" method="post">
            <input type="hidden" name="product_id" value="$row[product_id]">
            <input type="submit" value="Delete Product">
        </form>

    </div>
_END;
}

$result->close();
$conn->close();

echo <<<_END
    </div>
 <!-- Admin Options -->
    <div id="admin-options">
        <p>ADMIN:</p>
        <a href="add-product.php">Add Product</a>
        <a href="view-inventory.php">View Inventory</a> <!-- New Link to View Inventory -->
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
_END;

?>


