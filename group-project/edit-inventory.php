<?php
$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['inventory_id'])) {
    $inventory_id = $_GET['inventory_id'];

    // Fetch inventory data from the database
    $query = "SELECT * FROM inventory WHERE inventory_id = $inventory_id";
    $result = $conn->query($query);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $inventory = $result->fetch_assoc();
    } else {
        echo "<p>Inventory item not found.</p>";
        exit();
    }
} else {
    echo "<p>Inventory ID not provided.</p>";
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];

    // Update inventory data in the database
    $update_query = "UPDATE inventory SET quantity = '$quantity' WHERE inventory_id = $inventory_id";
    $update_result = $conn->query($update_query);

    if ($update_result) {
        header("Location: view-inventory.php");
        exit();
    } else {
        echo "Error updating inventory item: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory Item - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('inventory.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
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

        #edit-inventory-container {
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
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div id="edit-inventory-container">
        <h1>Edit Inventory Item - Suburban Outfitters</h1>
        <!-- Inventory editing form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?inventory_id=" . $inventory_id); ?>" method="post">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo $inventory['quantity']; ?>" required>
            <button type="submit">Update Inventory</button>
        </form>
        <a href="view-inventory.php" style="display: block; margin-top: 20px;">Back to Inventory List</a>
    </div>
</body>

</html>
