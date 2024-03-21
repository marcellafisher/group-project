<?php
session_start();

// Check if user is already logged in, redirect if true
if(isset($_SESSION['user'])) {
    header("Location: user-list.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    require_once 'login.php';

    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to fetch user data from database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if(password_verify($password, $row['password'])) {
            // Authentication successful, set user session
            $_SESSION['user'] = $row['username'];
            $_SESSION['role'] = $row['role']; // Assuming you have 'role' column in users table
            header("Location: about.php");
            exit();
        } else {
            // Incorrect password
            $error = "Invalid username or password";
        }
    } else {
        // User not found
        $error = "Invalid username or password";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters - Login</title>
    <link rel="stylesheet" href="styles.css">
   
          <style>
        body {
            background: url('graffiti.jpeg') no-repeat center center fixed;
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

        #login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px; /* Reduced padding */
            border-radius: 10px;
            width: 350px; /* Keep width as it is */
            text-align: center;
            margin: auto; /* Center the container */
            margin-top: 20px; /* Add space between navbar and container */
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
            text-decoration: none;
            display: block;
            margin-top: 10px;
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

    <div id="login-container">
        <h1>Welcome to Suburban Outfitters</h1>
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <!-- Add any error message display here -->
        <?php if(isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <!-- Additional links -->
        <a href="user-list.php">Continue as Guest</a>
        <p>Need to edit user details? <a href="edituser.php">Press here</a>.</p>
        <p>Delete your account? <a href="delete-user.php">Press here</a>.</p>
    </div>

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
