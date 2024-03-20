<?php
// Include the database connection file
require_once 'login.php';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $shirtSize = $_POST['shirt_size'];
    $pantSize = $_POST['pant_size'];
    $shoeSize = $_POST['shoe_size'];
    $address = $_POST['address'];

    // For project, not HW 3 Prepare and execute SQL query to insert user data into the database
     $query = "INSERT INTO users (username, password, forename, surname, shirt_size, pant_size, shoe_size, address) 
              VALUES ('$username', '$password', '$forename', '$surname', '$shirt_size', '$pant_size', '$shoe_size', '$address')";
    

    
    $result = $conn->query($query);

    // Check if insertion was successful
    if ($result) {
        // Redirect back to user-list.php after adding the customer
        header("Location: user-list.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters - Add Customer</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('BWcity.jpeg') no-repeat center center fixed;
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

        #user-add-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin: auto; /* Center the container */
            margin-top: 20px; /* Adjust the top margin as needed */
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
            <a href="return.php">Return</a>
            <!-- Add more links as needed for other pages -->
        </nav>
    </header>

    <div id="user-add-container">
        <h1>Suburban Outfitters - Add Customer</h1>
        <!-- Your user addition form here -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Include customer addition form fields -->
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="forename" placeholder="Forename" required>
            <input type="text" name="surname" placeholder="Surname" required>
            <input type="text" name="shirt_size" placeholder="Shirt Size">
            <input type="text" name="pant_size" placeholder="Pant Size">
            <input type="text" name="shoe_size" placeholder="Shoe Size">
            <input type="text" name="address" placeholder="Address" required>
            <button type="submit">Add Customer</button>
        </form>
        <a href="user-list.php">Cancel</a>
    </div>

    <!-- Footer Section -->
    <footer>
        <div id="footer-container">
            <div id="contact-footer">
                <h2>Contact Us</h2>
                <p>Email: info@suburbanoutfitters.com</p>
                <p>Phone: (555) 123-4567</p>
            </div>
            <div id="copyright">
                <p>&copy; 2024 SUBURBAN OUTFITTERS Retail, LLC. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>

