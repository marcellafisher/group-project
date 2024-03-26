<?php
$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    // Extracting and sanitizing input
    $name = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $size = $conn->real_escape_string($_POST['size']);
    $color = $conn->real_escape_string($_POST['color']);
    $price = $conn->real_escape_string($_POST['price']);
    $quantity = $conn->real_escape_string($_POST['quantity']);

    $sql1 = "INSERT INTO `products` (`category`, `name`, `size`, `color`, `price`) VALUES ('$category', '$name', '$size', '$color', '$price')";
    $conn->query($sql1);
    echo $conn->error;
    $product_id = $conn->insert_id;

    $sql2 = "INSERT INTO `inventory` (`product_id`, `date`, `quantity`, `cost`) VALUES ($product_id, '2024-01-01', $quantity, '10.00')";
    $conn->query($sql2);

    header("Location: view-inventory.php");

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('inventory.jpeg') no-repeat center center fixed;
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

        #user-add-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin: auto;
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
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
            <a href="authenticate.php">Login</a>
            <a href="user-list.php">User List</a>
            <a href="add-user.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <a href="return.php">Return</a>
            <a href="total-sales.php">Total Sales</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div id="user-add-container">
        <h1>Add New Product and Inventory</h1>
        <!-- Form for adding inventory -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" placeholder="Category" required>

            <label for="size">Size:</label>
            <input type="text" id="size" name="size" placeholder="Size" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" placeholder="Color" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Price" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" placeholder="Quantity" required>

            <button type="submit">Add Inventory</button>
        </form>
        <a href="view-inventory.php">Cancel</a>
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
