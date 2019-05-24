<?php
require 'includes/common.php';
?>

<html>
    <head>
<title>login_page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
<body>
    <br>

<center>
    <div class="w3-panel w3-red w3-card-4" style="width: 80%;">
    

<div class="w3-container">
    <br>
  <h2>Admin login</h2>
  <br>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red w3-round-large" style="font-size: 18px;">Login</button>
  <br>
  <br>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

        <form class="w3-container" action="admin_login_submit.php" method="POST">
        <div class="w3-section">
            <label style="color: black;"><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
          <label style="color: black;"><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
      </div>

    </div>
  </div>
</div>

</div>
</center>

<center>
<div class="w3-panel w3-green w3-card-4" style="width: 80%;">
    
<center>
<div class="w3-container">
    <br>
  <h2>Officer login</h2>
  <br>
  <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-green w3-round-large" style="font-size: 18px;">Login</button>
  <br>
  <br>
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

        <form class="w3-container" action="officer_login_submit.php" method="POST">
        <div class="w3-section">
          <label style="color: black;"><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
          <label style="color: black;"><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
      </div>

    </div>
  </div>
</div>
</center>
</div>
</center>    
    
<center>
    <div class="w3-panel w3-blue w3-card-4" style="width: 80%">
    
<center>
<div class="w3-container">
  <br>
  <h2>Poll login</h2>
  <br>
  <button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-blue w3-round-large" style="font-size: 18px;">Login</button>
  <br>
  <br>
  <div id="id03" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

        <form class="w3-container" action="poll_login_submit.php" method="POST">
        <div class="w3-section">
          <label style="color: black;"><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
          <label style="color: black;"><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
      </div>

    </div>
  </div>
</div>
</center>
</div>
</center>
            
</body>
</html>
