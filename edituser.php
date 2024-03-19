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
        <!-- Your user editing form here -->
        <form action="update-user.php" method="post">
            <!-- Display locked customer name -->
            <p>Customer Name: Sean White</p>

            <!-- Include editable user fields -->
            <input type="email" name="customerEmail" placeholder="Email" required>
            <input type="text" name="shirtSize" placeholder="Shirt Size">
            <input type="text" name="pantSize" placeholder="Pant Size">
            <input type="text" name="shoeSize" placeholder="Shoe Size">
            <input type="text" name="shippingAddress" placeholder="Shipping Address" required>

            <button type="submit">Update User</button>
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

