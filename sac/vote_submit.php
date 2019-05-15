<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['id'])){
header('location:voterlogin.php');
}
?>
<?php
$count=0;
$id=$_SESSION['id'];
$select_query="SELECT status FROM voter WHERE id='$id'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$status=$row[0];
if($status!=1){
$select_query="SELECT * FROM post";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
while($row=mysqli_fetch_array($select_query_result)){
    $a=$row['count'];
    if($a>1){
        $count++;
    }
}
$i=0;
while($i<$count){
    $post=$_POST['post'];
    $name=$_POST['name'];
    $x=$post[$i];
    $y=$name[$i];
    if($y=="None"){
        $i++;
        continue;
    }
    $select_query="SELECT post_id FROM post WHERE name='$x'";
    $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
    $result=mysqli_fetch_array($select_query_result);
    $post_id=$result[0];
    $select_query="SELECT id FROM contestant WHERE name='$y' AND post_id='$post_id'";
    $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
    $result=mysqli_fetch_array($select_query_result);
    $id=$result[0];
    $insert_query="INSERT INTO result(id)VALUES('$id')";
    mysqli_query($con,$insert_query) or die(mysqli_error($con));
    $i++;
}
$status=1;
$id=$_SESSION['id'];
$update_query="UPDATE voter SET status='$status' WHERE id='$id'";
mysqli_query($con,$update_query) or die(mysqli_error($con));
}
else{
    echo 'Vote limit exceeded';
}
header('location:voterlogin.php');