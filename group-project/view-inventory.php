<?php

$page_roles=array('admin');
require_once 'login.php'; 
require_once 'checksession.php';

// Establishing database connection
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// SQL to fetch inventory details, adjusting field to 'name'
$query = "SELECT inventory.inventory_id, products.name, inventory.quantity FROM inventory INNER JOIN products ON inventory.product_id = products.product_id";
$result = $conn->query($query);
if (!$result) die("Database access failed: " . $conn->error);

// Start of HTML output
echo <<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inventory - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('inventory.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0; /* Reset default body padding */
        }
        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            position: fixed; /* Make the header fixed at the top */
            width: 100%; /* Make the header full width */
            z-index: 999; /* Ensure the header appears above other content */
            top: 0; /* Lock the header at the very top */
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            color: #fff; /* Set text color to white */
        }
        nav a {
            color: #fff; /* Set link color to white */
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
        .container {
            max-width: 800px;
            margin: 80px auto; /* Adjust margin to accommodate fixed header */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333; /* Set text color to dark gray */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a, a:visited {
            color: #FFFFFF; /* Change link color to white */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .action-links a {
            margin-right: 10px;
        }
        
        footer {
        background-color: #333;
        color: white;
        padding: 10px 0;
        text-align: center;
    }

    #footer-container {
        max-width: 800px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #contact-footer,
    #copyright {
        flex: 1;
    }

    #contact-footer p,
    #copyright p {
        margin: 5px 0;
    }
    
    .action-links a {
    color: black; /* Change the color to black */
}

#product-list-container a {
    color: black;
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
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Inventory List</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
_END;

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['quantity']) . "</td>
            <td class=\"action-links\">
                <a href=\"edit-inventory.php?inventory_id={$row['inventory_id']}\">Edit</a>
                <a href=\"delete-inventory.php?inventory_id={$row['inventory_id']}\" onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
            </td>
          </tr>";
}

echo <<<_END
        </tbody>
    </table>
    <a href="add-inventory.php" style="color: black;">Add New Inventory Item</a>
    <a href="view-product.php" style="color: black; margin-bottom: 20px; display: inline-block;">Back to Product View</a>
  
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

$conn->close();
?>

