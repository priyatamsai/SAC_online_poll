<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=2)){
header('location:index.php');
}
?>
<html>
    <head>
        <title>booth</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    </head>
    <body>
        <header class="w3-container w3-dark-grey">
            <div class="w3-cell-row">
                <div class="w3-container w3-cell" style="width:80%;">
                <h1>Polling Booth</h1>
            </div>
                <div class="w3-container w3-cell">
                    
                    <a href="logout.php" class="ghost-button" style="height:100%;">Logout</a>
                </div>
            </div>
        </header>
    <center>
        <div class="w3-card-4" style="width:30%; margin-top: 8%;">

        <header class="w3-container w3-blue">
          <h1>Enter Electoral Number</h1>
        </header>

        <div class="w3-container">
            <form class="w3-container" action="poll1.php" method="POST">
                <br>
                <br>
                <label style="color: black;"><b>Electoral Number</b></label>
                <br><br>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Electoral Number" name="id" required>
                
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Submit</button>
                  
            
            </form>
            
  </div>
        </div>
            
        

        
    </center>
    </body>
</html>