<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['id'])){
header('location:voterlogin.php');
}
?>
<html>
    <head>
        
        <title>Voter Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
    </head>
    <body>
        <?php
        $posts = mysqli_query($con, "SELECT * FROM post");
        ?>
        <center><div class="w3-container w3-Green">
                    <h1>Voting Page</h1>
                  </div></center>
    <br>
        <center>
        <form class="w3-container" action="vote_submit.php" method="POST">
        
        <div style="width:85%; padding-top: 30px;">
                
        <table class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-blue" style="height:70px; font-size:17px; font-family: Arial;">		
                <th style="padding-top:20px;"><center>Post</center></th>
                <th style="padding-top:20px;"><center>Select Candidate</center></th>
                
            </tr>
	    </thead>

        <tbody>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($posts)){
        ?>
            <tr style="height:35px;">
                <td>
                    <center>
                    <?php echo $row['name']?>
                    <!-- <input class="w3-input w3-border" type="hidden" name="post[<?php// echo $i;?>]" value="<?php// echo $row['name']?>"> -->
                    </center>
                </td>

                <td>
                <center>
                <select class="w3-select w3-border" name="name[<?php echo $i;?>]">
                <option value="None" >None</option>
                <?php
                $a=$row['post_id'];
                $result1=mysqli_query($con, "SELECT * FROM contestant WHERE post_id='$a'");
                while($row1 = mysqli_fetch_array($result1)){
                ?>
                    <option value="<?php echo $row1['name'];?>" ><?php echo $row1['name'];?></option>
                <?php
                }?>
                </select></center>
                </td>
            </tr>
        <?php
            $i=$i+1;
        }?>
        </tbody>

        </table>
                
        </div>
            <center><button class="w3-button w3-green w3-section w3-padding w3-round-large" type="submit" style="font-size: 20px;">Submit</button></center>
        </form>
            </center>
    </body>
</html>