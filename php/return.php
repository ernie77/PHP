 <?php
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
$sql = "DELETE FROM Laina Where Books_isbn = $isbn";

if ($conn->query($sql) === TRUE) {
    echo "Created successfully";
} else {
    echo "Error creating: " . $conn->error;
}

$conn->close();
?> 