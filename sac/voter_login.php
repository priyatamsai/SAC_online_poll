<?php
require 'includes/common.php';
?>
<?php
$id= mysqli_real_escape_string($con,filter_input(INPUT_POST,'id'));
$rand= mysqli_real_escape_string($con,filter_input(INPUT_POST,'key'));

$select_query="SELECT id FROM voter WHERE id='$id' AND rand_no='$rand' AND status=0";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
if(mysqli_num_rows($select_query_result)==0){
    echo 'User does not exist or voter already has voted';
}
 else {
    $row=mysqli_fetch_array($select_query_result);
    $_SESSION['id']=$row[0];
    header('location:voter.php');
}
