kirja

<?php
$servername = "localhost";
$username = "library";
$password = "321Kirjasto";
$dbname = "libraryDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Books (isbn, title, author)
VALUES ('9781119527077', 'SQL for Dummies', 'Allen G. Taylor')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 