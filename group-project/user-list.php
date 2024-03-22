<?php

$page_roles=array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List - Suburban Outfitters</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('skate.jpeg') no-repeat center center fixed;
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

        #user-list-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
            max-width: 600px;
        }

        .user-name {
            margin-bottom: 20px;
        }

        .user-name a {
            color: #333;
            text-decoration: none;
        }

        .user-name a:hover {
            text-decoration: underline;
        }

        form {
            display: inline;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        #admin-options {
            position: fixed;
            bottom: 70px; /* Adjust this value to move the box up or down */
            right: 20px; /* Adjust this value to move the box left or right */
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
        }

        #admin-options a {
            display: block;
            margin-bottom: 5px;
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
        </nav>
    </header>

    <div id="user-list-container">
        <h1>User List - Suburban Outfitters</h1>
_END;

$query = "SELECT * FROM users";
$result = $conn->query($query);
if (!$result) die($conn->error);

$rows = $result->num_rows;
for ($j = 0; $j < $rows; $j++) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_BOTH);

    echo <<<_END
    <div class="user-name">
        <a href='user-details.php?user_id=$row[user_id]'>$row[forename] $row[surname]</a>
        <form action="delete-user.php" method="post">
            <input type="hidden" name="user_id" value="$row[user_id]">
            <input type="submit" value="Delete User">
        </form>
           <div id="admin-options">
        <p>ADMIN:</p>
        <a href="user-add.php">Add User</a>
    </div>
    </div>
_END;
}

$result->close();
$conn->close();    

echo <<<_END
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
_END;

?>

