<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=1)){
header('location:index.php');
}
?>
<html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    
<?php
$name= mysqli_real_escape_string($con,filter_input(INPUT_POST,'name'));
$id= mysqli_real_escape_string($con,filter_input(INPUT_POST,'id'));
$select_query="SELECT * FROM contestant WHERE id='$id'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
if(mysqli_num_rows($select_query_result)!=0){?>
    <body>
     <center>
         <div class="w3-container">
            <form class="w3-container" action="officer.php">
        <div class="w3-card-4" style="width:70%; margin-top:10%;">
    <header class="w3-container w3-grey">
      <h3>Contestant Add</h3>
    </header>
    <div class="w3-container">
      <p>Contestant has already been added</p>
      <hr>
      
      
    </div>
    <button class="w3-button w3-block w3-dark-grey">Back</button>
  </div>
            </form>
         </div>
    </center>
</body>
<?php
}else{
$year= mysqli_real_escape_string($con,filter_input(INPUT_POST,'year'));
$branch= mysqli_real_escape_string($con,filter_input(INPUT_POST,'branch'));
$cgpa= mysqli_real_escape_string($con,filter_input(INPUT_POST,'cgpa'));
$ph_no= mysqli_real_escape_string($con,filter_input(INPUT_POST,'ph_no'));
$post= mysqli_real_escape_string($con,filter_input(INPUT_POST,'option'));
$date= mysqli_real_escape_string($con,filter_input(INPUT_POST,'date'));
$select_query="SELECT post_id,count FROM post WHERE name='$post'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$post_id=$row[0];
$count=$row[1];
$count=$count+1;
echo $post_id;
$update_query="UPDATE post SET count='$count' WHERE post_id='$post_id'";
mysqli_query($con,$update_query) or die(mysqli_error($con));
$insert_query="INSERT INTO contestant(id,name,year,branch,cgpa,ph_no,date,post_id)VALUES('$id','$name','$year','$branch','$cgpa','$ph_no','$date','$post_id')";
mysqli_query($con,$insert_query) or die(mysqli_error($con));
header('location:officer.php');}