<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=0)){
header('location:index.php');
}
?>
<?php
$username=$_SESSION['username'];
$select_query="SELECT password FROM users WHERE username='$username'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$password=$row[0];
$truncate_query="TRUNCATE TABLE contestant";
mysqli_query($con,$truncate_query) or die(mysqli_error($con));
$truncate_query="TRUNCATE TABLE post";
mysqli_query($con,$truncate_query) or die(mysqli_error($con));
$truncate_query="TRUNCATE TABLE users";
mysqli_query($con,$truncate_query) or die(mysqli_error($con));
$truncate_query="TRUNCATE TABLE student";
mysqli_query($con,$truncate_query) or die(mysqli_error($con));
$truncate_query="TRUNCATE TABLE result";
mysqli_query($con,$truncate_query) or die(mysqli_error($con));
$truncate_query="TRUNCATE TABLE voter";
mysqli_query($con,$truncate_query) or die(mysqli_error($con));
$status=0;
$insert_query="INSERT INTO users(username,password,status)VALUES('$username','$password','$status')";
mysqli_query($con,$insert_query) or die(mysqli_error($con));
header('location:admin.php');