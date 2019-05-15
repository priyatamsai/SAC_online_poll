<?php
require 'includes/common.php';
?>
<?php
$username= mysqli_real_escape_string($con,filter_input(INPUT_POST,'usrname'));
$pass= mysqli_real_escape_string($con,filter_input(INPUT_POST,'psw'));
$password= md5($pass);
$status=1;
$select_query="SELECT username FROM users WHERE username='$username' AND password='$password' AND status='$status'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
if(mysqli_num_rows($select_query_result)==0){
    echo 'User does not exist';
}
 else {
    $row=mysqli_fetch_array($select_query_result);
    $_SESSION['username']=$row[0];
    $_SESSION['status']=1;
    header('location:officer.php');
}
