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
$select_query="SELECT * FROM post WHERE name='$name'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
if(mysqli_num_rows($select_query_result)!=0){?>
    <body>
        <center>
            <div class="w3-container">
                <form class="w3-container" action="officer.php">

                <div class="w3-card-4" style="width:70%; margin-top:10%;">
                    <header class="w3-container w3-grey">
                    <h3>Post Add</h3>
                    </header>
                    <div class="w3-container">
                        <p>Post has already been added</p>
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
    $count=0;
    $insert_query="INSERT INTO post(name,count)VALUES('$name','$count')";
    mysqli_query($con,$insert_query) or die(mysqli_error($con));
    header('location:officer.php');
}