<?php
session_start();
if(!isset($_SESSION["type"]) && !isset($_SESSION['key']) && !$_SESSION["type"]=="Librarian"){
    header("location:LoginLibrary.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Profile</title>
    <link rel="stylesheet" href="viewp.css">
</head>
<body>
    <h1>View Profile</h1>
    <div class="members-list">
        <?php
            require_once("dblib.php");
            $query="";
            //echo "User: ".$_SESSION["key"];
            // Fetch member data
            if($_SESSION["type"]=="Librarian"){

                $query = "SELECT * FROM studentinfo";
            }else{
                $query = "SELECT * FROM studentinfo where email= '".$_SESSION["key"]."'";
            }
            $result = mysqli_query($con, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($con)); // Check query errors
            }
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='members'>";
                echo "<p>Email: " . htmlspecialchars($row['email']) . "</p>";
                echo "<p>Name: " . htmlspecialchars($row['name']) . "</p>";
                echo "<p>Mobile: " . htmlspecialchars($row['mobile']) . "</p>";
                echo "<p>Gender: " . htmlspecialchars($row['gender']) . "</p>";
                echo "</div>";
            }
            

            // Close database connection
            mysqli_close($con);
        ?>
    </div>
</body>
</html>