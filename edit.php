<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
	<link rel="stylesheet" href="editp.css">
</head>
<body>
    <h1>Edit Profile</h1>
    <form action="edit.php" method="POST">
    <label for="SN">sid:</label><br>
        <input type="text" id="SN" name="sid" required><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br><br>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="mobile">Mobile:</label><br>
        <input type="text" id="mobile" name="mobile"><br><br>

        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender"><br><br>

        <input type="submit" value="Edit">
    </form>
</body>
</html>
<?php
require_once("dblib.php");
if(isset($_POST['sid'] )&&isset($_POST['email'])&&isset($_POST['name'])&&isset($_POST['gender']) ){
$SN=$_POST['SN'];
$lastname=$_POST['email'];
$username=$_POST['name'];
$password=$_POST['gender'];
}

if ( !empty($SN)&&!empty($email)&&!empty($name) &&!empty($gender) ){
  if(!($result=mysql_query($query,$database)))
{
    print("Could not execute query");
    die (mysql_error());//ose error
}
else echo "You are logged in successfully";
}

?>