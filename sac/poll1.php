<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=2)){
header('location:index.php');
}
?>
<?php
$id= mysqli_real_escape_string($con,filter_input(INPUT_POST,'id'));
$re=mysqli_query($con, "SELECT * FROM voter where id='$id'");
$count=mysqli_num_rows($re);
$result = mysqli_query($con, "SELECT roll_no FROM student WHERE id='$id'");
$row = mysqli_fetch_array($result);
$ran=mt_rand(100,999);
?>
<html>
    <head>
        <title>booth</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <?php
        if($count==0){
            ?>
    <center>
        <div class="w3-card-4" style="width:30%; margin-top: 6%;">

        <header class="w3-container w3-blue">
          <h1>Key</h1>
        </header>

        <div class="w3-container">
            <form class="w3-container" action="voter_add.php" method="POST">
                <br>
                
                <label style="color: black;"><b>Electoral Number</b></label>
                
                <div class="w3-panel w3-grey w3-card-4" style="padding-top: 10px;padding-bottom: 10px;">
                <input class="w3-input w3-border w3-margin-bottom" type="hidden" name="id" value="<?php echo $id;?>"><?php echo $id;?>
                </div>
                

                <label style="color: black;"><b>Roll Number</b></label>
                

                <div class="w3-panel w3-grey w3-card-4" style="padding-top: 10px;padding-bottom: 10px;">
                <input class="w3-input w3-border w3-margin-bottom" type="hidden" name="roll_no" value="<?php echo $row['roll_no'];?>"><?php echo $row['roll_no'];?>
                </div>
                

                <label style="color: black;"><b>Key</b></label>
                

                <div class="w3-panel w3-grey w3-card-4" style="padding-top: 10px;padding-bottom: 10px;">
                <input class="w3-input w3-border w3-margin-bottom" type="hidden" name="key" value="<?php echo $ran;?>"><?php echo $ran;?>
                </div>
                <br>

                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Submit</button>
                  
            
            </form>
            
  </div>
        </div>
            
        

        
    </center>
    <?php
        }
        else{
            $r1 = mysqli_fetch_array($re);
            ?>
        <center>
        <div class="w3-card-4" style="width:30%; margin-top: 6%;">

        <header class="w3-container w3-blue">
          <h1>Key</h1>
        </header>

        <div class="w3-container">
            <form class="w3-container" action="poll.php">
                <br>
                
                <label style="color: black;"><b>Electoral Number</b></label>
                
                <div class="w3-panel w3-grey w3-card-4" style="padding-top: 10px;padding-bottom: 10px;">
                <?php echo $id;?>
                </div>
                

                <label style="color: black;"><b>Roll Number</b></label>
                

                <div class="w3-panel w3-grey w3-card-4" style="padding-top: 10px;padding-bottom: 10px;">
                <?php echo $row['roll_no'];?>
                </div>
                

                <label style="color: black;"><b>Key</b></label>
                

                <div class="w3-panel w3-grey w3-card-4" style="padding-top: 10px;padding-bottom: 10px;">
                <?php echo $r1['rand_no'];?>
                </div>
                <br>

                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Back</button>
                  
            
            </form>
            
  </div>
        </div>
            
        

        
    </center>
    <?php
        }?>
    </body>
</html>