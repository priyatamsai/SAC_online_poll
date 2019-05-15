<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=1)){
header('location:index.php');
}
?>
<?php
$name= mysqli_real_escape_string($con,filter_input(INPUT_POST,'name'));
$id= mysqli_real_escape_string($con,filter_input(INPUT_POST,'id'));
$year= mysqli_real_escape_string($con,filter_input(INPUT_POST,'year'));
$branch= mysqli_real_escape_string($con,filter_input(INPUT_POST,'branch'));
$cgpa= mysqli_real_escape_string($con,filter_input(INPUT_POST,'cgpa'));
$ph_no= mysqli_real_escape_string($con,filter_input(INPUT_POST,'ph_no'));
$date= mysqli_real_escape_string($con,filter_input(INPUT_POST,'date'));
$update_query="UPDATE contestant SET name='$name',year='$year',branch='$branch',cgpa='$cgpa',ph_no='$ph_no',date='$date' WHERE id='$id'";
mysqli_query($con,$update_query)or die(mysqli_error($con));
header('location:officer.php');