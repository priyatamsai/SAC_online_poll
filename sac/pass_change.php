<?php
require 'includes/common.php';
$newpass= mysqli_real_escape_string($con,filter_input(INPUT_POST,'newpassword'));
$repass= mysqli_real_escape_string($con,filter_input(INPUT_POST,'repassword'));
$newpassword=md5($newpass);
if($newpass!=$repass){
    
}
$username= mysqli_real_escape_string($con,filter_input(INPUT_POST,'username'));
$update_query="UPDATE users SET password='$newpassword' WHERE users.username='$username'";
mysqli_query($con,$update_query) or die(mysqli_error($con));