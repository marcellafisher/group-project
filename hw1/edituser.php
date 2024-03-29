<?php
// Include the database connection file
require_once 'login.php';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Initialize variables for user details
$customerEmail = $shirtSize = $pantSize = $shoeSize = $shippingAddress = "";
$selectedUser = "";

// Check if the user is selected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user data
    $selectedUser = $_POST['selected_user'];

    // Retrieve user details from the database
    $query = "SELECT * FROM users WHERE id = '$selectedUser'";
    $result = $conn->query($query);

    // Check if user details are retrieved successfully
    if ($result && $result->num_rows > 0) {
        // Fetch user details
        $row = $result->fetch_assoc();
        $customerEmail = $row['username'];
        $shirtSize = $row['shirt_size'];
        $pantSize = $row['pant_size'];
        $shoeSize = $row['shoe_size'];
        $shippingAddress = $row['address'];
    } else {
        // Display error message if user details are not found
        echo "Error: User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('concrete.avif') no-repeat center center fixed;
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
            font-size: 14px; /* Adjust the font size as needed */
            font-weight: bold;
        }

        #navbar-logo {
            font-size: 1.5rem;
        }

        #edit-user-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin: auto; /* Center the container */
            margin-top: 50px; /* Adjust the top margin as needed */
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
            <a href="login-form.php">Login</a>
            <a href="user-list.php">User List</a>
            <a href="user-add.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

    <div id="edit-user-container">
        <h1>Edit User - Suburban Outfitters</h1>
        <!-- User selection form -->
      <!-- User selection form -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <select name="selected_user">
        <option value="">Select a User</option> <!-- Add a default option -->
        <?php
        // Retrieve list of users from the database
        $query = "SELECT id, username FROM users";
        $result = $conn->query($query);

        // Display each user as an option in the dropdown
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'";
                if ($selectedUser == $row['id']) {
                    echo " selected";
                }
                echo ">" . $row['username'] . "</option>";
            }
        }
        ?>
    </select>
    <button type="submit">Select User</button>
</form>


        <!-- User editing form -->
        <form action="update-user.php" method="post">
            <!-- Display selected user details -->
            <p>Customer Name: <?php echo $customerEmail; ?></p>

            <!-- Include editable user fields -->
            <input type="hidden" name="userId" value="<?php echo $selectedUser; ?>">
            <input type="email" name="customerEmail" placeholder="Email" value="<?php echo $customerEmail; ?>" required>
            <input type="text" name="shirtSize" placeholder="Shirt Size" value="<?php echo $shirtSize; ?>">
            <input type="text" name="pantSize" placeholder="Pant Size" value="<?php echo $pantSize; ?>">
            <input type="text" name="shoeSize" placeholder="Shoe Size" value="<?php echo $shoeSize; ?>">
            <input type="text" name="shippingAddress" placeholder="Shipping Address" value="<?php echo $shippingAddress; ?>" required>

            <button type="submit">Update User</button>
        </form>
        <a href="user-list.php">Cancel</a>
    </div>

    <!-- Footer Section -->
    <footer>
        <!-- Your footer content -->
    </footer>
</body>

</html>

