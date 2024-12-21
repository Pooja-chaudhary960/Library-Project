<?php
    session_start();
?>
<div class="book">
<!DOCTYPE html>
<html>
<head>
    <title>View Book Information</title>
	<link rel="stylesheet" href="viewb.css">
</head>
<body>
<h1 class="top-text">View Book Information</h1>
 <div class="book">
<?php
require_once("dblib.php");
// SQL query to retrieve transaction records
$sql = "SELECT bid, bname, qty from book";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Bid</th><th>Bname</th><th>Qty</th></tr>";
    while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["bid"]."</td><td>".$row["bname"]."</td><td>".$row["qty"]."</td></tr>";
    }
}
      // Close database connection
        mysqli_close($con);
?>
</div>
</body>
</html>