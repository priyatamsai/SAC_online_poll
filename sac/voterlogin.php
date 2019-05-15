<?php
require 'includes/common.php';
?>
<html>
    <head>
        <title>Voter Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <center>
        <div class="w3-card-4" style="width:40%; margin-top: 10%;">

        <header class="w3-container w3-blue">
          <h1>Enter Details</h1>
        </header>

        <div class="w3-container">
            <form class="w3-container" action="voter_login.php" method="POST">
                <br>
                <label style="color: black;"><b>Electoral Number</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Electoral Number" name="id" required>
                <label style="color: black;"><b>Key</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Key" name="key" required>
                <br>
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Submit</button>
            </form>
        </div>

        

        </div>
    </center>
    </body>
</html>