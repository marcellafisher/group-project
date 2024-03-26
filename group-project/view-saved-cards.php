<?php

$page_roles=array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);


$sql = "SELECT id, card_number, created_at FROM credit_cards";
$result = $conn->query($sql);

echo "<!DOCTYPE html><html><head><title>All Saved Cards</title>";
echo "<style>
    body {
        background: url('sun.jpeg') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    header {
        background-color: #333;
        padding: 10px;
        text-align: center;
        color: #fff;
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
    .container {
        max-width: 600px;
        margin: 80px auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }
    .card-info {
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .back-link {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #333;
        text-decoration: none;
    }
    h2, p {
        color: #333;
        text-align: center;
    }
</style>
</head>
<body>";

// Navbar
echo "<header>
    <nav>
        <a href='about.php'>About</a>
        <a href='authenticate.php'>Login</a>
        <a href='user-list.php'>User List</a>
        <a href='add-user.php'>Add Customer</a>
        <a href='order.php'>Shopping</a>
        <a href='return.php'>Return</a>
        <a href='logout.php'>Logout</a>
    </nav>
</header>";

echo "<a href='cart.php' class='back-link'>Back to Cart</a>";
echo "<div class='container'>";
echo "<h2>All Saved Credit Cards</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $maskedCardNumber = str_repeat("*", strlen($row['card_number']) - 4) . substr($row['card_number'], -4);
        echo "<div class='card-info'>";
        echo "<p>Card Number: " . htmlspecialchars($maskedCardNumber) . "</p>";
        echo "<p>Added On: " . htmlspecialchars($row['created_at']) . "</p>";
        // Add an edit link for each entry
        echo "<p><a href='edit-card.php?id=" . $row['id'] . "'>Edit</a> | ";
        // Add a delete link for each entry
        echo "<a href='delete-card.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this card?\");'>Delete</a></p>";
        echo "</div>";
    }
} else {
    echo "<p>No saved credit cards.</p>";
}

echo "</div>";

// Footer
echo "<footer>
    <div id='footer-container' style=\"background-color: #333; color: white; padding: 10px 0; text-align: center;\">
        <div id='contact-footer' style=\"float: left;\">
            <h2 style=\"margin-bottom: 5px; color: white;\">Contact Us</h2>
            <p style=\"margin: 0; color: white;\">Email: info@suburbanoutfitters.com</p>
            <p style=\"margin: 0; color: white;\">Phone: (555) 123-4567</p>
        </div>
        <div id='copyright' style=\"float: right; margin-top: 50px;\"> <!-- Adjusted margin-top -->
            <p style=\"margin: 0; color: white; font-size: 11px;\">&copy; 2024 SUBURBAN OUTFITTERS Retail, LLC. All Rights Reserved.</p>
        </div>
        <div style=\"clear: both;\"></div>
    </div>
</footer>
";




echo "</body></html>";

$conn->close();
?>


