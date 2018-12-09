<?php
require('test_input.php');
$servername = "127.0.0.1:49227";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "libraryDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
//$find and $option will come from webform
$find=test_input($_POST["find"]);
$option=test_input($_POST["option"]);
$sql = "SELECT * FROM Books WHERE $option LIKE '%$find%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<ul>";
	while($row = $result->fetch_assoc()) {
		echo "<li>isbn: " . $row["isbn"]. " - Title: " . $row["title"]. " - Author: " . $row["author"]. " - ";
    	$l = $row["isbn"];
    	$sql = "SELECT * FROM laina WHERE books_isbn = $l";
    	$loan = $conn->query($sql);
    	if ($loan->num_rows > 0) {
			//include '../return.html';
			echo "<form action='return.php' method='post'>
					<input type='hidden' name='isbn' value=" . $row["isbn"] . ">
					<input type='submit' value='Borrow'>
					</form>";
		} else {
			//include '../borrow.html';
			echo "<form action='borrow.php' method='post'>
					<input type='hidden' name='isbn' value=" . $row["isbn"] . ">
					<input type='hidden' name='isbn' value=" . $row["user"] . ">
					<input type='submit' value='Borrow'>
					</form>";
		}
      echo "</li><br>";
	}
	echo "</ul>";
} else {
   echo "0 results";
}
$conn->close();
?> 