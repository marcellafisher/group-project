<?php

$page_roles=array('admin');


// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_GET['product_id'])) {
    // Get the product ID from the URL
    $product_id = $_GET['product_id'];

    // Fetch product data from the database
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = $conn->query($query);

    // Check if product data is found
    if($result->num_rows == 1) {
        // Fetch product details
        $product = $result->fetch_assoc();
    } else {
        // Product not found
        echo "<p>Product not found.</p>";
        exit(); // Stop further execution
    }
} else {
    // Product ID not provided
    echo "<p>Product ID not provided.</p>";
    exit(); // Stop further execution
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $category = $_POST['category'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    
    // Update product data in the database
    $update_query = "UPDATE products SET category = '$category', name = '$name', size = '$size', color = '$color', price = $price WHERE product_id = $product_id";
    $update_result = $conn->query($update_query);

    // Check if update was successful
    if ($update_result) {
        // Redirect to order.php after successful update
        header("Location: view-product.php");
        exit();
    } else {
        // Display error message if update fails
        echo "Error updating product: " . $conn->error;
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
        body {
            background: url('sun.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
     }

        #edit-product-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            max-width: 600px;
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
            <a href="total-sales.php">Total Sales</a>
            <a href="logout.php">Logout</a>
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>
    
  <div id="edit-product-container">
        <h1>Edit Product</h1>
        <!-- Form for editing product -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?product_id=" . $product_id); ?>" method="post">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>

            <label for="size">Size:</label>
            <input type="text" id="size" name="size" value="<?php echo $product['size']; ?>" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?php echo $product['color']; ?>" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required>

            <button type="submit">Update Product</button>
        </form>
        <a href="view-product.php">Cancel</a>
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

