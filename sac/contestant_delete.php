<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=1)){
header('location:index.php');
}
?>
<?php
require 'includes/common.php';
$id= mysqli_real_escape_string($con,filter_input(INPUT_POST,'id'));
$select_query="SELECT post_id FROM contestant WHERE id='$id'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$post_id=$row[0];
$select_query="SELECT count FROM post WHERE post_id='$post_id'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$count=$row[0];
$count=$count-1;
$update_query="UPDATE post SET count='$count' WHERE post_id='$post_id'";
mysqli_query($con,$update_query) or die(mysqli_error($con));
$delete_query="DELETE FROM contestant WHERE id='$id'";
mysqli_query($con,$delete_query) or die(mysqli_error($con));
header('location:officer.php');