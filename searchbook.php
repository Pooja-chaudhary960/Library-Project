<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Books</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .search-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .search-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }
        .search-container form {
            text-align: center;
        }
        .search-container input[type="text"] {
            padding: 10px;
            width: 60%;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }
        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
        }
        .result-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .result-container h2 {
            font-size: 20px;
            margin-bottom: 10px;
            text-align: center;
        }
        .result-container div {
            margin-bottom: 10px;
        }
        .result-container strong {
            font-weight: bold;
        }
        .result-container hr {
            margin-top: 10px;
            margin-bottom: 10px;
            border: 0;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="search-container">
    <h1>Search Books</h1>
    <form method="post" action="">
        <input type="text" name="search_query" placeholder="Enter book name" required>
        <input type="submit" name="search" value="Search">
    </form>
</div>

<?php
// Include database connection
include 'dblib.php';

if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    
    // Prepare and execute query
    $search_term = "%" . $search_query . "%";
    $sql = "SELECT bid, bname, qty FROM book WHERE bname LIKE ? OR bid LIKE ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result->num_rows > 0) {
        echo "<div class='result-container'><h2></h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div><strong>Book ID:</strong> " . htmlspecialchars($row['bid']) . "<br>";
            echo "<strong>Book Name:</strong> " . htmlspecialchars($row['bname']) . "<br>";
            echo "<strong>Quantity:</strong> " . htmlspecialchars($row['qty']) . "<br><hr></div>";
        }
        echo "</div>";
    } else {
        echo "<div class='result-container'>No books found.</div>";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>

</body>
</html>