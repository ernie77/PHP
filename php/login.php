
<?php
$servername = "127.0.0.1:49227";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "libraryDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
//$password=md5($password); // Encrypted Password
$sql="SELECT id FROM admin WHERE username='$username' and passcode='$password'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($conn,$result);

// If result matched $username and $password, table row must be 1 row
if($count==1)
{
header("location: ../index.html");
}
else
{
$error="Your Login Name or Password is invalid";
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
<?php
session_start();
if(session_destroy())
{
header("Location: login.php");
}
?>