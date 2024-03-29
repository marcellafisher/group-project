<?php
$page_roles = array('admin', 'customer');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('sun.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 70%;
            text-align: center;
            margin-top: 20px; /* Adjusted margin-top */
        }

        .lead {
            background-color: rgba(240, 240, 240, 0.6);
            padding: 10px;
            border-radius: 5px;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            width: 100%;
            color: white;
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

        #navbar-logo {
            font-size: 1.5rem;
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
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

    <div class="container mt-4">
        <?php if (!empty($_SESSION['cart'])): ?>
            <h1 class="mb-4">Shopping Cart</h1>
            <ul class="list-group mb-3">
                <?php $total_price = 0; ?>
                <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($product['name']); ?> - $<?php echo htmlspecialchars($product['price']); ?> - Quantity: <?php echo htmlspecialchars($product['quantity']); ?>
                        <a href="remove-from-cart.php?remove=<?php echo $product_id; ?>" class="btn btn-danger btn-sm">REMOVE</a>
                    </li>
                    <?php $total_price += $product['price'] * $product['quantity']; ?>
                <?php endforeach; ?>
            </ul>
            <p class="lead">Total Price: $<?php echo $total_price; ?></p>
            <a href="view-product.php" class="btn btn-secondary">Continue Shopping</a>
            <hr>
            <!-- View Saved Payment Methods Button -->
            <a href="view-saved-cards.php" class="btn btn-info mt-3">View Saved Payment Methods</a>
            <!-- Checkout form with save credit card option -->
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
                        <input type="month" class="form-control" name="expiration_date" id="expiration_date" required>
                    </div>
                    <div class="col">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" name="cvv" id="cvv" required>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="save_card" name="save_card">
                    <label class="form-check-label" for="save_card">Save this card for future use</label>
                </div>
                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                <button type="submit" class="btn btn-primary mt-3">Check Out</button>
            </form>
        <?php else: ?>
            <p class="lead">Your cart is empty. <a href="view-product.php" class="btn btn-secondary">Continue shopping</a></p>
            <div class="container mt-4" style="padding-bottom: 100px;">

        <?php endif; ?>
    </div>



</body>

</html>

