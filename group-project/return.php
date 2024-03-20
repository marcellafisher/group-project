<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('ppl.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
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
            width: 100%;
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

        #return-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            max-width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
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
            margin-bottom: 10px;
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
        </nav>
    </header>

    <div id="return-container">
        <h1>Return Items</h1>
        <form action="#" method="post">
            <label for="return-date">Return Date:</label>
            <input type="date" id="return-date" name="returnDate" required>

            <label for="return-quantity">Quantity:</label>
            <input type="number" id="return-quantity" name="returnQuantity" required>

            <label for="return-item">Item:</label>
            <input type="text" id="return-item" name="returnItem" required>

            <button type="submit">Submit Return</button>
        </form>
        <a href="edit-return.php">Edit Return</a>
        <a href="view-return.php">View Return</a>
        <a href="cancel-return.php">Cancel Return</a>
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

