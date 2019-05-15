<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=0)){
header('location:index.php');
}
?>
<?php
$username= mysqli_real_escape_string($con,filter_input(INPUT_POST,'usrname'));
$pass= mysqli_real_escape_string($con,filter_input(INPUT_POST,'password'));
$password= md5($pass);
$status=2;
$insert_query="INSERT INTO users(username,password,status)VALUES('$username','$password','$status')";
mysqli_query($con,$insert_query) or die(mysqli_error($con));
header('location:admin.php');