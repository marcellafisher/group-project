<?php

$page_roles = array('admin','customer');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Return - Suburban Outfitters</title>
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

        #view-return-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            max-width: 300px;
        }

        input[type="text"] {
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
            <a href="authenticate.php">Login</a>
            <a href="user-list.php">User List</a>
            <a href="user-add.php">Add Customer</a>
            <a href="order.php">Shopping</a>
            <a href="return.php">Return</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

   <div id="view-return-container">
        <h1>View Return</h1>
        <form action="view-return2.php" method="get">
            <label for="return_id">Select Return ID:</label>
            <select name="return_id" id="return_id" required>
                <option value="">Select a Return</option>
                <?php
                // Include the database connection file
                require_once 'login.php';

                // Connect to the database
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

                // Retrieve return IDs from the database
                $query = "SELECT return_id FROM returns";
                $result = $conn->query($query);

                // Output options for each return ID
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row["return_id"]}'>{$row["return_id"]}</option>";
                    }
                } else {
                    echo "<option value=''>No returns found</option>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <button type="submit">View Details</button>
        </form>

        <?php if (isset($_GET['return_id'])) : ?>
            <!-- Add buttons to go to edit-return and cancel-return -->
            <?php $return_id = $_GET['return_id']; ?>
            <a href="edit-return.php?return_id=<?php echo $return_id; ?>"><button>Edit Return</button></a>
            <a href="cancel-return.php?return_id=<?php echo $return_id; ?>"><button>Cancel Return</button></a>
        <?php endif; ?>

        <a href="return.php">Back to Returns</a>
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
