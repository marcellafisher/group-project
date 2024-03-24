<html>

<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

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

$result=$conn->query($query);
if(!$result) die ($conn->error);

if ($result) {
    
echo <<<_END

<div class="container mt-5">
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
