<?php
$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// Process the form when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Sanitize and prepare variables from the form input
    $id = $_POST['id'];
    $cardNumber = $_POST['card_number'];

    // SQL to update the credit card number based on the given id
    $sql = "UPDATE credit_cards SET card_number = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters to the SQL query and execute
    $stmt->bind_param("si", $cardNumber, $id);
    if ($stmt->execute()) {
        // Redirect back to the view-saved-cards.php page on successful update
        header("Location: view-saved-cards.php");
        exit();
    } else {
        // Display an error message if something goes wrong with the update
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} elseif (isset($_GET['id'])) {
    // If the script is accessed directly with an id parameter, fetch the current card number for editing
    $id = $_GET['id'];

    // Prepare the SQL statement to select the credit card number
    $sql = "SELECT card_number FROM credit_cards WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the id parameter, execute the statement, and fetch the result
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $cardNumber = $row['card_number'];
    } else {
        echo "No record found.";
        $stmt->close();
        $conn->close();
        exit();
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Card</title>
    <style>
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
          footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
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
            color: white; /* Change text color to white */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href='about.php'>About</a>
                    <a href='authenticate.php'>Login</a>
            <a href='user-list.php'>User List</a>
            <a href='add-user.php'>Add Customer</a>
            <a href='order.php'>Shopping</a>
            <a href='return.php'>Return</a>
            <a href='logout.php'>Logout</a>
        </nav>
    </header>

    <a href='cart.php' class='back-link'>Back to Cart</a>
    <div class='container'>
        <h2>Edit Credit Card</h2>
        <form action="edit-card.php" method="post">
            <!-- Hidden field for storing the card id -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <label for="card_number">Card Number:</label>
            <!-- Input field for the new card number -->
            <input type="text" id="card_number" name="card_number" value="<?php echo htmlspecialchars($cardNumber); ?>" required>
            <!-- Submit button for updating the card number -->
            <button type="submit" name="update">Update Card</button>
        </form>
        <!-- Link to go back to the list of saved cards -->
        <a href="view-saved-cards.php">Back to Saved Cards</a>
    </div>

   <footer>
    <div id='footer-container' style="background-color: #333; color: white; padding: 10px 0; text-align: center;">
        <div id='contact-footer' style="float: left;">
            <h2 style="margin-bottom: 5px; color: white;">Contact Us</h2>
            <p style="margin: 0; color: white;">Email: info@suburbanoutfitters.com</p>
            <p style="margin: 0; color: white;">Phone: (555) 123-4567</p>
        </div>
        <div id='copyright' style="float: right; margin-top: 50px;"> <!-- Adjusted margin-top -->
            <p style="margin: 0; color: white; font-size: 11px;">&copy; 2024 SUBURBAN OUTFITTERS Retail, LLC. All Rights Reserved.</p>
        </div>
        <div style="clear: both;"></div>
    </div>
</footer>
</body>
</html>


