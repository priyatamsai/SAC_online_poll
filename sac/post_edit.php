<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=1)){
header('location:index.php');
}
?>
<?php
$name= mysqli_real_escape_string($con,filter_input(INPUT_POST,'oldname'));
$select_query="SELECT post_id FROM post WHERE name='$name'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$post_id=$row[0];
$newname= mysqli_real_escape_string($con,filter_input(INPUT_POST,'newname'));
$update_query="UPDATE post SET name='$newname' WHERE post_id='$post_id'";
mysqli_query($con,$update_query) or die(mysqli_error($con));
header('location:officer.php');