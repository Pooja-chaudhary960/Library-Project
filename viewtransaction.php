<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View transaction</title>
	<link rel="stylesheet" href="viewtrans.css">
</head>
<body>
<h1>View Transaction</h1>
<?php
require_once("dblib.php");
// SQL query to retrieve transaction records
$sql = "SELECT b1.email,bname,borrow_date, return_date from borrow as b1, return_book as r1, book as b2 where b1.email=r1.email
and b1.bid = b2.bid;";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Email</th><th>Bname</th><th>Borrow Date</th><th>Return Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["email"]."</td><td>".$row["bname"]."</td><td>".$row["borrow_date"]."</td><td>".$row["return_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$con->close();
?>
</html>