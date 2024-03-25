<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the total price from the form data
    $total_price = $_POST['total_price'];

    // Process the payment (fake implementation)
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];

    // You can perform additional validation and processing as needed

    // Simulate payment processing delay
    //sleep(2);

    // Clear the cart after successful checkout
    $_SESSION['cart'] = array();
    echo 'Checkout successful. Your order total was $' . $total_price . '.';
	echo '<a href="view-product.php">Back to shopping</a>';
}

// Redirect back to the cart page
///header('Location: cart.php');
//exit();

?>
