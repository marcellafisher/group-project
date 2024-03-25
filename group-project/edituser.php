<?php

$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['user_id'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = $conn->query($query);

    // Check if query executed successfully
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    // Check if user data is found
    if ($result->num_rows == 1) {
        // Fetch user details
        $user = $result->fetch_assoc();
    } else {
        // User not found
        echo "<p>User not found.</p>";
        exit(); // Stop further execution
    }
} else {
    // User ID not provided
    echo "<p>User ID not provided.</p>";
    exit(); // Stop further execution
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $shirt_size = $_POST['shirt_size'];
    $pant_size = $_POST['pant_size'];
    $shoe_size = $_POST['shoe_size'];
    $address = $_POST['address'];

    // Update user data in the database
    $update_query = "UPDATE users SET 
                        username = '$username', 
                        password = '$password', 
                        forename = '$forename', 
                        surname = '$surname', 
                        shirt_size = '$shirt_size', 
                        pant_size = '$pant_size', 
                        shoe_size = '$shoe_size', 
                        address = '$address' 
                    WHERE user_id = $user_id";
    $update_result = $conn->query($update_query);

    // Check if update was successful
    if ($update_result) {
        // Redirect to user-list.php after successful update
        header("Location: user-list.php");
        exit();
    } else {
        // Display error message if update fails
        echo "Error updating user: " . $conn->error;
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
    <title>Edit User - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Add additional styles if needed -->
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
            font-size: 14px;
            font-weight: bold;
        }

        #edit-user-container {
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
            <a href="user-add.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <a href="return.php">Return</a>
            <a href="total-sales.php">Total Sales</a>
            <a href="logout.php">Logout</a>
            
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

    <div id="edit-user-container">
        <h1>Edit User - Suburban Outfitters</h1>
        <!-- User editing form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?user_id=" . $user_id); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required>

            <label for="forename">Forename:</label>
            <input type="text" id="forename" name="forename" value="<?php echo $user['forename']; ?>" required>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" value="<?php echo $user['surname']; ?>" required>

            <label for="shirt_size">Shirt Size:</label>
            <input type="text" id="shirt_size" name="shirt_size" value="<?php echo $user['shirt_size']; ?>" required>

              <label for="pant_size">Pant Size:</label>
             <input type="text" id="pant_size" name="pant_size" value="<?php echo $user['pant_size']; ?>" required>

            <label for="shoe_size">Shoe Size:</label>
             <input type="text" id="shoe_size" name="shoe_size" value="<?php echo $user['shoe_size']; ?>" required>

          <label for="address">Address:</label>
          <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" required>

         <button type="submit">Update User</button>
</form>