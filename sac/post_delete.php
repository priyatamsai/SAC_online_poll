<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=1)){
header('location:index.php');
}
?>
<?php
require 'includes/common.php';
$name= mysqli_real_escape_string($con,filter_input(INPUT_POST,'name'));
$delete_query="DELETE FROM post WHERE name='$name'";
mysqli_query($con,$delete_query) or die(mysqli_error($con));
header('location:officer.php');