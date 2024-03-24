<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php if (!empty($_SESSION['cart'])): ?>
            <h1 class="mb-4">Shopping Cart</h1>
            <ul class="list-group mb-3">
                <?php $total_price = 0; ?>
                <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $product['name']; ?> - $<?php echo $product['price']; ?> - Quantity: <?php echo $product['quantity']; ?>
                        <a href="remove-from-cart.php?remove=<?php echo $product_id; ?>" class="btn btn-danger btn-sm">REMOVE</a>
                    </li>
                    <?php $total_price += $product['price'] * $product['quantity']; ?>
                <?php endforeach; ?>
            </ul>
            <p class="lead">Total Price: $<?php echo $total_price; ?></p>
            <a href="view-product.php" class="btn btn-secondary">Continue Shopping</a>
            <hr>
            <!-- Checkout form -->
            <form action="checkout.php" method="post" class="mt-3">
                <div class="form-group">
                    <label for="cardholder_name">Cardholder Name:</label>
                    <input type="text" class="form-control" name="cardholder_name" id="cardholder_name" required>
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input type="text" class="form-control" name="card_number" id="card_number" required>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="expiration_date">Expiration Date:</label>
                        <input type="text" class="form-control" name="expiration_date" id="expiration_date" required>
                    </div>
                    <div class="col">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" name="cvv" id="cvv" required>
                    </div>
                </div>
                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                <button type="submit" class="btn btn-primary mt-3">Check Out</button>
            </form>
        <?php else: ?>
            <p class="lead">Your cart is empty. <a href="view-product.php" class="btn btn-secondary">Continue shopping</a></p>
        <?php endif; ?>
    </div>
    <!-- Optional JavaScript and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
