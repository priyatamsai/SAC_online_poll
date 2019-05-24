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
        <style>
        .ghost-button {
  display: inline-block;
  width: 200px;
  padding:.4cm;
  color: #fff;
  
  
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: background-color 0.2s ease-out,
              border-color 0.2s ease-out;
}
.ghost-button:hover{ 
  background-color: white;
  color: black;
  text-decoration: none;
  border-color: rgba(255, 255, 255, 0.4);
  transition: background-color 0.2s ease-in,
              border-color 0.2s ease-in;}
.ghost-button:active {background-color: #9363c4;
  border-color: #9363c4;
  color: #fff;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
 }
 a{font-family: Arial Rounded MT Bold,Helvetica Rounded,Arial,sans-serif;
font-size:20px;
font-weight:300;
float:right;}
    </style>
        <title>Officer Page</title>
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
        <header class="w3-container w3-dark-grey">
            <div class="w3-cell-row">
                <div class="w3-container w3-cell" style="width:80%;">
                <h1>Officer</h1>
            </div>
                <div class="w3-container w3-cell">
                    
                    <a href="logout.php" class="ghost-button" style="height:100%;">Logout</a>
                </div>
            </div>
        </header>
        <?php
        $result = mysqli_query($con, "SELECT * FROM contestant");
        $result5 = mysqli_query($con, "SELECT * FROM contestant");
        $r5 = mysqli_query($con, "SELECT * FROM post");
        $r6 = mysqli_query($con, "SELECT * FROM post");
        ?>
        <div class="w3-bar">
            <button onclick="document.getElementById('contestant_add').style.display='block'" class="w3-bar-item w3-button w3-grey w3-hover-green" style="font-size:20px; width:33.3%;">Add Contestant</button>
            <button onclick="document.getElementById('post_add').style.display='block'" class="w3-bar-item w3-button w3-grey w3-hover-green" style="font-size:20px; width:33.3%;">Add Post</button>
            <button onclick="document.getElementById('results_div').style.display='block'" class="w3-bar-item w3-button w3-grey w3-hover-green" style="font-size:20px; width:33.3%;">Results</button>
        </div>
        <div>
                <div class="w3-container">

                <div id="results_div" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:1000px">
                    <div class="w3-center">
                      <span onclick="document.getElementById('results_div').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                    </div>
                      
                      <div class="w3-section" style="height:70%; overflow-y: scroll;">
                        <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:130px; height: 61.5%;">
                          <div class="w3-panel w3-blue" style="padding:2px;">
                            <h5 class="w3-bar-item" >Post Name</h5>
                          </div> 
<?php
                          while($row5 = mysqli_fetch_array($r5)){
?>
                            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, '<?php echo $row5['name'];?>')">
                              <?php echo $row5['name'];?>
                            </button>
<?php
                          }
?>
                        </div>

<div style="margin-left:130px">
  <?php
                            while($row5 = mysqli_fetch_array($r6)){
                            ?>
    <div id="<?php echo $row5['name'];?>" class="w3-container city" style="display:none"><br>
    <h2><?php echo $row5['name'];?></h2>
    <?php
        $x=$row5['post_id'];
                            $r1 = mysqli_query($con, "SELECT * FROM contestant WHERE post_id='$x'");
                            $r2 = mysqli_query($con, "SELECT * FROM contestant WHERE post_id='$x'");
                            ?><br>
    <table class="w3-table-all w3-hoverable">
        
                            <thead>
                              <tr class="w3-blue">
                            <th><center>Contestant Name</center></th>
                            <th><center>Number of votes</center></th>
                             
                            </tr>
                            </thead>
                            <?php
                            
                            $max1=0;
                            $maxname=array();
                            $maxn='';
                            while($r = mysqli_fetch_array($r1)){
                            ?>
                            <tr>
                              <td><center><?php echo $r['name'];?></center></td>
                              
                              <td><center>
                                  <?php
                                  $eid=$r['id'];
                                  $c2=mysqli_query($con, "SELECT * FROM result WHERE id= '$eid'");
                                  $count1=mysqli_num_rows($c2);
                                  echo $count1;
                                  if($max1<$count1)
                                  {
                                      $max1=$count1;
                                      $maxn=$r['name'];
                                  }
                                  ?></center>
                              </td>
                              
                            </tr>
                            <?php
                            }
                             
                            ?>
                            
    </table>
          <?php
          $f=0;
          array_push($maxname, "$maxn");
                            while($r0 = mysqli_fetch_array($r2)){
                                 $eid1=$r0['id'];
                                  $c21=mysqli_query($con, "SELECT * FROM result WHERE id= '$eid1'");
                                  $count11=mysqli_num_rows($c21);
                                  
                                  if($max1==$count11&&$maxn!=$r0['name'])
                                  {
                                      $f=1;
                                      $p=$r0['name'];
                                      array_push($maxname, "$p");
                                      
                                  }
                             }
                             if($f==0)
                             {
                                 ?>
    <div class="w3-panel w3-green w3-card-4" style="padding:10px;">
    <?php echo "Winner  :   $maxn";?> 
        <br>
        <?php echo "Votes :    $max1";?>
        <br></div>
<?php
                             }
                             if($f==1)
                             {
                                 ?>
    <div class="w3-panel w3-green w3-card-4" style="padding:10px;">
        <p>TIE</p>
                             <?php
                                 foreach ($maxname as $value) {
                                 ?>
    
    <?php echo "Winner  :   $value";?> 
        <br>
        <?php echo "Votes :    $max1";?><br>
                             <?php }}
                             ?>
    
    
  
  </div>
  <?php
                            }?>

  </div></div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
                        

                      </div>
                    

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        
                      <button onclick="document.getElementById('results_div').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                      
                    </div>

                  </div>
                </div>
              </div>
            
   
        </div>
        
        <div>

          <div class="w3-container">
            <div id="contestant_add" class="w3-modal">
              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">
                <div class="w3-center"><br>
                  <span onclick="document.getElementById('contestant_add').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                </div>

                <form class="w3-container" action="contestant_add.php" method="POST">
                  <div class="w3-section">
                    <label><b>Contestant Name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Contestant Name" name="name" required>

                    <label><b>Electoral Number</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Enter Electoral Number" name="id" required>
                    <br>
                    <label><b>Post</b></label>
                    <select class="w3-select w3-border" name="option">
                        <option value="" disabled selected>Select Post</option>
                        <?php
                        $posts=mysqli_query($con, "SELECT * FROM post");
                        while($row1 = mysqli_fetch_array($posts)){
                        ?>
                        <option value="<?php echo $row1['name'];?>" ><?php echo $row1['name'];?></option>
                        <?php
                        }?>
                    </select>
                    <br>
                    <br>
                    <label><b>Year</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Year" name="year" required>

                    <label><b>Branch</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Enter Branch" name="branch" required>
                    <br>
                    <label><b>Date of Nomination</b></label>
                    <input class="w3-input w3-border" type="date"  name="date"  size="15" maxlength="10">
                    <br>
                    <label><b>CGPA</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Enter CGPA" name="cgpa" required>
                    <br>
                    <label><b>Phone Number</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Enter Contact Number" name="ph_no" required>
                    <br>
                    <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add Contestant</button>

                  </div>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                  <button onclick="document.getElementById('contestant_add').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                </div>

              </div>
            </div>
          </div>

        </div>


        <?php
        $result3 = mysqli_query($con, "SELECT * FROM post");
        ?>
        <div>
          <div class="w3-container">
          <div id="post_add" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

              <div class="w3-center"><br>
                <span onclick="document.getElementById('post_add').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
              </div>

              <form class="w3-container" action="post_add.php" method="POST">
              <div class="w3-section">
                <label><b>Post Name</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Post Name" name="name" required>
                <br>
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add Post</button>
              </div>
              </form>

              <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('post_add').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
              </div>
              
            </div>
          </div>
          </div>
        </div>

        <center>
        <div style="width:85%; padding-top: 30px;">
        <table class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-blue" style="height:70px; font-size:17px; font-family: Arial;">		
                <th style="padding-top:20px;"><center>S.No</center></th>
                <th style="padding-top:20px;"><center>Post Name</center></th>
                <th style="padding-top:20px;"><center>Number of Contestants</center></th>
                <th style="padding-top:20px;"><center>Edit Post Name</center></th>
                <th style="padding-top:20px;"><center>Remove Post</center></th>
            </tr>
	</thead>	
	<tbody>
            <?php
            $i=1;
            while($row3 = mysqli_fetch_array($result3)){
                $pid=$row3['post_id'];
                $c1=mysqli_query($con, "SELECT * FROM contestant WHERE post_id= '$pid'");
                $count=mysqli_num_rows($c1);
            ?>
            <tr style="height:35px;">
                
                    <td><center><?php echo $i;?></center></td>
                    <td><center><?php echo $row3['name'];?></center></td>
                    <td><center><?php echo $count;?></center></td>
                    <td><center>
                        <div>
           
                <div class="w3-container">
               
                <button onclick="document.getElementById('myBtn41<?php echo $row3['name'];?>').style.display='block'" class="w3-button w3-round w3-blue w3-hover-green" style="font-size:14px;">Edit</button>
                <div id="myBtn41<?php echo $row3['name'];?>" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

                    <div class="w3-center"><br>
                      <span onclick="document.getElementById('myBtn41<?php echo $row3['name'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    </div>

                      <form class="w3-container" action="post_edit.php" method="POST">
                      <div class="w3-section">
                          
                        <label><b>Present Post Name   :</b></label>
                            <input type="hidden" name="oldname" value="<?php echo $row3['name'];?>"><?php echo $row3['name'];?>
                        <br>
                        <br>
                        <label><b>Changed Post Name</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Post Name" name="newname" required>
                        <br>
                        <br>
                      
                        
                            
                        
                        <button class="w3-button w3-block w3-red w3-section w3-padding" type="submit">Edit Post Name</button>
                      </div>
                    </form>

                    

                  </div>
                </div>
                
                    </center></td>
                    <td><center>
                    <div>
           
                <div class="w3-container">
                <?php
                
                if($count==0)
                {
                ?>
                <button onclick="document.getElementById('myBtn21<?php echo $row3['name'];?>').style.display='block'" class="w3-button w3-round w3-red w3-hover-blue"  ><i class="material-icons">close</i></button>
                <div id="myBtn21<?php echo $row3['name'];?>" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

                    <div class="w3-center"><br>
                      <span onclick="document.getElementById('myBtn21<?php echo $row3['name'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    </div>

                      <form class="w3-container" action="post_delete.php" method="POST">
                      <div class="w3-section">
                          
                        <label><b>Post Name   :</b></label>
                            <input type="hidden" name="name" value="<?php echo $row3['name'];?>"><?php echo $row3['name'];?>
                        <br>
                        <br>
                        
                            
                        
                        <button class="w3-button w3-block w3-red w3-section w3-padding" type="submit">Remove Post</button>
                      </div>
                    </form>

                    

                  </div>
                </div>
                <?php
                }
                else{
                ?>
                <button onclick="document.getElementById('myBtn22<?php echo $row3['name'];?>').style.display='block'" class="w3-button w3-round w3-red w3-hover-blue"  ><i class="material-icons">close</i></button>
                <div id="myBtn22<?php echo $row3['name'];?>" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

                    <div class="w3-center"><br>
                      <span onclick="document.getElementById('myBtn22<?php echo $row3['name'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    </div>

                      <div class="w3-section">
                          <br>
                          <br>
                          <br>
                          <p>First Remove all the contestants who are participating for this post</p> 
                        
                        <br>
                        <br>
                      
                      </div>
                      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                      <button onclick="document.getElementById('myBtn22<?php echo $row3['name'];?>').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

                    </div>
                  </div>
                     
                </div>
                <?php
                }?>
                
              </div>
            
   
        </div>
                      </center></td>
                    </center></td>
                    
			
		</tr>
                    
                
           
            <?php
            $i=$i+1;
            }
            ?>
       	</tbody>
	</table>
    </div>
    </center>

        
        
        
        
        
        
        
        
        
        
        

        <center>
        <div style="width:85%; padding-top: 30px;">
        <table class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-blue" style="height:70px; font-size:17px; font-family: Arial;">		
                <th style="padding-top:20px;"><center>Name</center></th>
                <th style="padding-top:20px;"><center>Electoral no</center></th>
                <th style="padding-top:20px;"><center>Post Name</center></th>
                <th style="padding-top:20px;"><center>Details of contestant</center></th>
                <th style="padding-top:20px;"><center>Edit contestant</center></th>
                <th style="padding-top:20px;"><center>Remove contestant</center></th>
            </tr>
	</thead>	
	<tbody>
            <?php
            while($row = mysqli_fetch_array($result)){
            ?>
            <tr style="height:35px;">
                
                    <td><center><?php echo $row['name'];?></center></td>
                    <td><center><?php echo $row['id'];?></center></td>
                    <td><center><?php $a=$row['post_id'];$b=mysqli_query($con, "SELECT name FROM post WHERE post_id='$a'");$c=mysqli_fetch_array($b);echo $c['name'];?></center></td>
                    <td><center>
                    <div>
           
                <div class="w3-container">
                <button onclick="document.getElementById('myBtn3<?php echo $row['id'];?>').style.display='block'" class="w3-button w3-round w3-blue w3-hover-green" style="font-size:14px;">Details</button>

                <div id="myBtn3<?php echo $row['id'];?>" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

                    <div class="w3-center"><br>
                      <span onclick="document.getElementById('myBtn3<?php echo $row['id'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    </div>

                      
                      <div class="w3-section">
                        <label><b>Contestant Name   :</b></label>
                        <?php echo $row['name'];?>
                        <br>
                        <br>
                        <label><b>Electoral Number  :</b></label>
                        <?php echo $row['id'];?>
                        <br>
                        <br>
                        <label><b>Post  :</b></label>
                            <?php $a=$row['post_id'];$b=mysqli_query($con, "SELECT name FROM post WHERE post_id='$a'");$c=mysqli_fetch_array($b);echo $c['name'];?>
                          <br>
                        
                        <br>
                        <label><b>Year  :</b></label>
                        <?php echo $row['year'];?>
                        <br>
                        <br>
                        <label><b>Branch    :</b></label>
                        <?php echo $row['branch'];?>
                        <br>
                        <br>
                        <label><b>Date of Nomination    :</b></label>
                        <?php echo $row['date'];?>
                        <br>
                        <br>
                        <label><b>CGPA  :</b></label>
                        <?php echo $row['cgpa'];?>
                        <br>
                        <br>
                        <label><b>Phone Number  :</b></label>
                        <?php echo $row['ph_no'];?>
                        <br>
                        <br>
                        

                      </div>
                    

                    

                    </div>

                  </div>
                </div>
              </div>
            
                        <td><center>
                    <div class="w3-container">
                <button onclick="document.getElementById('myBtn7<?php echo $row['id'];?>').style.display='block'" class="w3-button w3-round w3-blue w3-hover-green" style="font-size:14px;">Edit</button>

                <div id="myBtn7<?php echo $row['id'];?>" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

                    <div class="w3-center"><br>
                      <span onclick="document.getElementById('myBtn7<?php echo $row['id'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    </div>

                      <form class="w3-container" action="contestant_edit.php" method="POST">
                      <div class="w3-section">
                        <label><b>Contestant Name</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $row['name'];?>" name="name" required>

                        <label><b>Electoral Number</b></label>
                        <div class="w3-panel w3-border" style="padding-top:10px; padding-bottom: 10px;">
                        <input class="w3-input w3-border" type="hidden" value="<?php echo $row['id'];?>" name="id" required><?php echo $row['id'];?>
                        </div>
                        <label><b>Post</b></label>
                        <div class="w3-panel w3-border" style="padding-top:10px; padding-bottom: 10px;">
                        <input class="w3-input w3-border" type="hidden" value="<?php $a=$row['post_id'];$b=mysqli_query($con, "SELECT name FROM post WHERE post_id='$a'");$c=mysqli_fetch_array($b);echo $c['name'];?>" name="post" required><?php $a=$row['post_id'];$b=mysqli_query($con, "SELECT name FROM post WHERE post_id='$a'");$c=mysqli_fetch_array($b);echo $c['name'];?>
                        <br></div>
                          
                        <label><b>Year</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $row['year'];?>" name="year" required>

                        <label><b>Branch</b></label>
                        <input class="w3-input w3-border" type="text" value="<?php echo $row['branch'];?>" name="branch" required>
                        <br>
                        <label><b>Date of Nomination</b></label>
                        <input class="w3-input w3-border" type="date"  name="date" value="<?php echo $row['date'];?>" size="15" maxlength="10">
                        <br>
                        <label><b>CGPA</b></label>
                        <input class="w3-input w3-border" type="text" value="<?php echo $row['cgpa'];?>" name="cgpa" required>
                        <br>
                        <label><b>Phone Number</b></label>
                        <input class="w3-input w3-border" type="text" value="<?php echo $row['ph_no'];?>" name="ph_no" required>
                        <br>
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Edit Contestant</button>

                      </div>
                    </form>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                      <button onclick="document.getElementById('myBtn7<?php echo $row['id'];?>').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

                    </div>

                  </div>
                </div>
              </div>
                        </center></td>
   
        
        
                      <td><center>
                    <div>
           
                <div class="w3-container">
                <button onclick="document.getElementById('myBtn2<?php echo $row['id'];?>').style.display='block'" class="w3-button w3-round w3-red w3-hover-blue"  ><i class="material-icons">close</i></button>

                <div id="myBtn2<?php echo $row['id'];?>" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

                    <div class="w3-center"><br>
                      <span onclick="document.getElementById('myBtn2<?php echo $row['id'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    </div>

                      <form class="w3-container" action="contestant_delete.php" method="POST">
                      <div class="w3-section">
                        <label><b>Contestant Name   :</b></label>
                            <?php echo $row['name'];?>
                        <br>
                        <br>
                        <label><b>Electoral Number  :</b></label>
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>"><?php echo $row['id'];?>
                        <br>
                        <br>
                        <label><b>Post  :</b></label>
                            <?php $a=$row['post_id'];$b=mysqli_query($con, "SELECT name FROM post WHERE post_id='$a'");$c=mysqli_fetch_array($b);echo $c['name'];?>
                          <br>
                          <br>
                 
                        <label><b>Date of Nomination    :</b></label>
                            <?php echo $row['date'];?>
                        <br>
                        <br>
                        
                        <button class="w3-button w3-block w3-red w3-section w3-padding" type="submit">Remove Contestant</button>
                      </div>
                    </form>

                    

                  </div>
                </div>
              </div>
            
   
        </div>
                      </center></td>
                    
                    
			
		</tr>
                    
                
           
            <?php
            }
            ?>
       	</tbody>
	</table>
    </div>
    </center>
    </body>
</html>