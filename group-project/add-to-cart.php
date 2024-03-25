<?php
// Start the session
session_start();

// Include the database connection file
include_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// Add item into the cart
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Fetch the product from the database
    $result = $conn->query("SELECT * FROM products WHERE product_id = $product_id");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Add the product to the cart session
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$product_id] = array(
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => 1
            );
        }
        $_SESSION['message'] = 'Product added to cart.';
    } else {
        $_SESSION['error'] = 'Product not found.';
    }

	print_r($_SESSION['cart']);

    // Redirect back to the product listing page
    header('Location: view-product.php');
    exit();
}


?>