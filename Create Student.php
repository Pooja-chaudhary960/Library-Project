<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Student</title>
	<link rel="stylesheet" href="creatmem.css">
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $Sid =  $_POST['Sid'];
    $email= $_POST['email'];
    $name = $_POST['name'];
    $mobile=$_POST['mobile'];
    $gender=$_POST['gender'];

require_once ("dblib.php");
$insert = "Insert into studentinfo values('$Sid','$email','$name','$mobile','$gender')";
mysqli_query($con,$insert) or die("Insertion Error");
	echo "Record saved successfully";
}
?>
<form action="" method="post">
<input type="number" name="Sid" placeholder="Sid" required><br><br>
<input type="text" name="email" placeholder="Email" required><br><br>
<input type="text" name="name" placeholder="Name" required><br><br>
<input type="number" name="mobile" placeholder="Mobile" required><br><br>
<input type="text" name="gender" placeholder="Gender" required><br><br>
<input type="submit" name="submit" value="Create Student">
</form>
</body>
</html>