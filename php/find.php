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
    while($row = $result->fetch_assoc()) {
    	echo "isbn: " . $row["isbn"]. " - Title: " . $row["title"]. " Author: " . $row["author"];
    	$sql = "SELECT * FROM Laina WHERE Books_isbn is '$row["isbn"]'";
    	$loan = $conn->query($sql);
    	if ($loan) {
        echo "lainassa"
     }
    }
} else {
    echo "0 results '$option'";
}
$conn->close();
?> 