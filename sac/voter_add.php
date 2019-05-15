<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=2)){
header('location:index.php');
}
?>
<?php
$id= mysqli_real_escape_string($con,filter_input(INPUT_POST,'id'));
$rand= mysqli_real_escape_string($con,filter_input(INPUT_POST,'key'));

$status=0;
$insert_query="INSERT INTO voter(id,rand_no,status)VALUES('$id','$rand','$status')";
mysqli_query($con,$insert_query) or die(mysqli_error($con));
header('location:poll.php');