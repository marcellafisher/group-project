<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suburban Outfitters - Customer Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('models.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            width: 100%;
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

        #user-details-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            margin-top: 20px; /* Adjusted margin-top */
        }

        #user-details-container p {
            margin-bottom: 10px;
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

    <div id="user-details-container">
        <h1>Suburban Outfitters - Customer Details</h1>
        <!-- Display details of the selected customer -->
        <p>Customer: Sean White</p>
        <p>Email: sean.white@example.com</p>
        <p>Shirt Size: L</p>
        <p>Pant Size: 34</p>
        <p>Shoe Size: 11</p>
        <p>Address: 456 Avenue, City, Country</p>
        <!-- Add a link to go back to user-list.php -->
        <a href="user-list.php">Back to User List</a>
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
