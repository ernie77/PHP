
<?php
require('test_input.php');
$servername = "127.0.0.1:49227";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "libraryDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);
//$password=md5($password); // Encrypted Password
$sql="SELECT id FROM admin WHERE username='$username' and passcode='$password'";
$result = $conn->query($sql);

// If result matched $username and $password, table row must be 1 row
if ($result->num_rows > 0) {
{
header("location: ../index.html");
}
else
{
echo "Your Login Name or Password is invalid";
}
}
?>
<form action="login.php" method="post">
<label>UserName :</label>
<input type="text" name="username"/><br />
<label>Password :</label>
<input type="password" name="password"/><br/>
<input type="submit" value=" Login "/><br />
</form>
