<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Information</title>
	<link rel="stylesheet" href="editbook.css">
</head>
<body>
    <form action="" method="POST">
        <label for="bid">Book ID:</label><br>
        <input type="text" id="bid" name="bid" required><br><br>
        
        <label for="bname">Book name:</label><br>
        <input type="text" id="bname" name="bname"><br><br>
        
        <label for="qty">Quantity:</label><br>
        <input type="text" id="qty" name="qty"><br><br>

        <input type="submit" value="Edit">
    </form>
</body>
</html>
<?php
require_once("dblib.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve form data
$bid = $_POST['bid'];
$bname = $_POST['bname'];
$qty = $_POST['qty'];

// Update book information
$sql = "UPDATE book SET bid='$bid', bname='$bname', qty='$qty' WHERE bid=$bid";

if ($con->query($sql) === TRUE) {
    echo "Book information updated successfully";
} else {
    echo "Error updating book information: " . $con->error;
}

$con->close();
}
?>