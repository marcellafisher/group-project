<?php
session_start();

// Database connection parameters
$host = 'localhost'; // Adjust as necessary
$dbUser = 'root'; // Default MAMP user
$dbPassword = 'root'; // Default MAMP password
$dbName = 'group_project'; // Your database name
$conn = new mysqli($host, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id']; // Make sure you have user_id in your session
    $cardholderName = $conn->real_escape_string($_POST['cardholder_name']);
    $cardNumber = $conn->real_escape_string($_POST['card_number']); // Consider encrypting this
    $expiryDate = $conn->real_escape_string($_POST['expiry_date']); // Ensure this is in 'YYYY-MM-DD' format
    $cvv = $conn->real_escape_string($_POST['cvv']); // Consider encrypting this

    // SQL to insert credit card info
    $sql = "INSERT INTO credit_cards (user_id, cardholder_name, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("issss", $userId, $cardholderName, $cardNumber, $expiryDate, $cvv);
    if ($stmt->execute()) {
        // Display the message
        echo "<div class='message-box'>
                Your purchase was successful.<br>Thank you for shopping with Suburban Outfitters!<br><br>
                <a href='about.php' style='color: black;'>About Us</a>
              </div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters</title>
    <style>
        body {
            background-image: url('graffiti.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-box {
            background-color: rgba(211, 211, 211, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 24px;
            font-family: Arial, sans-serif;
            color: black;
        }
    </style>
</head>
<body>
</body>
</html>

