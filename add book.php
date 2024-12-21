<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
	<link rel="stylesheet" href="book.css">
</head>
<body>
<h1>ADD Book </h1>
<?php
if(isset($_POST['submit'])){
    $bid = $_POST['bid'];
    $bname= $_POST['bname'];
    $qty = $_POST['qty'];

require_once ("dblib.php");
$insert = "Insert into book values('$bid','$bname','$qty')";
mysqli_query($con,$insert) or die("Insertion Error");
	echo "Record saved successfully";
}
?>
<form action="" method="post">
<input type="number" name="bid" placeholder="BID" required><br><br>
<input type="text" name="bname" placeholder="Bookname" required><br><br>
<input type="number" name="qty" placeholder="Quantity" required><br><br>
<input type="submit" name="submit" value="ADD Book">
</form>
</body>
</html>