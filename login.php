<?php
session_start();
//echo $username;
//echo $password;
 // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
header("location: index.html");
}
else
{

$username=$_POST['username'];
$password=$_POST['password'];
// Define $username and $password
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$connection = mysqli_connect("localhost", "root", "", "blackboard");
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select * from user_acc where Password='$password' AND Username='$username'");
$rows = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);
if ($rows == 1) {
$_SESSION["login"]=$username; // Initializing Session
if($row[Acc_type]=="Admin" || $row[Acc_type]=="admin")
header("location: register.php"); // Redirecting To Other Page
else if ($row[Acc_type]=="Faculty") {
	$_SESSION["acc_type"]="Faculty";
	$_SESSION["UID"]=$row[UID];
	header("location: welcome.php"); // Redirecting To Other Page
}
else if ($row[Acc_type]=="GA") {
	$_SESSION["acc_type"]="GA";
	$_SESSION["UID"]=$row[UID];
	header("location: welcome.php"); // Redirecting To Other Page
}
} else {
header("location: index.html");
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>>