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
$sql = "INSERT INTO Laina (Books_isbn, User_id)
VALUES ($isbn, $user)";

if ($conn->query($sql) === TRUE) {
    echo "Created successfully";
} else {
    echo "Error creating: " . $conn->error;
}

$conn->close();
?> 