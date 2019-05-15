<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=0)){
header('location:index.php');
}
?>
<?php
require 'includes/common.php';
$username= mysqli_real_escape_string($con,filter_input(INPUT_POST,'username'));
$delete_query="DELETE FROM users WHERE id='$username'";
mysqli_query($con,$delete_query) or die(mysqli_error($con));
header('location:admin.php');