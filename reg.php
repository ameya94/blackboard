<?php
$con=mysqli_connect("localhost","root","","blackboard");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// escape variables for security
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);
$uname = mysqli_real_escape_string($con, $_POST['uname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$utype = mysqli_real_escape_string($con, $_POST['utype']);
$add= mysqli_real_escape_string($con, $_POST['add']);

$sql="INSERT INTO user_acc(`Acc_type`, `Username`, `Password`, `Email`, `First_Name`, `Last_Name`, `address`)
VALUES ('$utype', '$uname' ,'$pass','$email','$fname','$lname','$add')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
header("location: index.html");
mysqli_close($con);
session_destroy();
?>
