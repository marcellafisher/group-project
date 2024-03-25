<?php

$page_roles = array('admin');

// Include the database connection file
require_once 'login.php';
require_once 'checksession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Sales Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>

<body>

   <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Sales Report - Suburban Outfitters</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('sun.jpeg') no-repeat center center fixed;
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

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 80%; /* Adjusted width to take up most of the page */
        }

        table {
            width: 100%;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
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

    <?php
    require_once 'login.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    // Assuming $mysqli is your database connection
    $query = "SELECT e.employee_id, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, 
	SUM(p.price) AS total_sales
	FROM Orders o
	JOIN Products p ON o.product_id = p.product_id
	JOIN Employees e ON o.employee_id = e.employee_id
	GROUP BY e.employee_id
	ORDER BY total_sales DESC
	";

    $result = $conn->query($query);
    if (!$result) die($conn->error);

    if ($result) {

        echo <<<_END

    <div class="container">
        <h2>Employee Sales Report</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Total Sales</th>
                </tr>
            </thead>
            <tbody>

_END;

        // Assuming $result is the result of your SQL query
        while ($row = $result->fetch_assoc()) {
            $employeeId = $row['employee_id'];
            $name = $row['employee_name'];
            $total = $row['total_sales'];

            echo "<tr>";
            echo "<td>$employeeId</td>";
            echo "<td>$name</td>";
            echo "<td>$$total</td>";
            echo "</tr>";
        }

        echo <<<_END
            </tbody>
        </table>
    </div>

_END;

        // Sort sales from largest to smallest
        //arsort($employeeSales);

        //foreach ($employeeSales as $employeeId => $totalSales) {
        //    echo "Employee ID: $employeeId, Total Sales: $totalSales<br>";
        //}
    } else {
        echo "Error fetching data: " . $mysqli->error;
    }
    ?>

    <footer>
        <p>&copy; 2024 Suburban Outfitters Retail, LLC. All Rights Reserved.</p>
    </footer>
</body>

</html>
