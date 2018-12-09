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


// values will come from webform
$username=test_input($_POST["username"]);
$passcode=test_input($_POST["passcode"]);
$lname=test_input($_POST["fname"]);
$lname=test_input($_POST["lname"]);
$sql = "INSERT INTO User (firstname, lastname, username, passcode)
VALUES ('$fname', '$lname', '$username', '$passcode')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
sleep(5);
header('location: ../index.html');
exit;
?> 