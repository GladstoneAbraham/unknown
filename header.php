<?php
  require "validate.php";
  require "sessions.php";
  require "db_init.php";
  header("Refresh:60");
  ?>
  <html>
  <head>
    <title>Project Secure Programmers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php
    if(!isset($_COOKIE['SSID']))
    {
      if($_SESSION['lock']==true){
        echo "<pre><br/>Your account has been locked because of too many failed logins.<br />If this is the case, <em>please try again in {$lockout_time} minutes</em>.</pre>";
      }
        else {
          if($_SESSION['failed']==true){
          echo "<pre><br />Username and/or password incorrect.<br /></pre>";
        }
      ?>
      <div class = "jumbotron jumbotron-fluid">
        <div class="container">
         <h1 align="center">Project Unknown Login Page</h1>
       </div>
      </div>
        <div class="container">
        <div class = "row">
        <div class = "col-lg-4">
        </div>
        <div class = "col-lg-2">
       <form action="login_val.php" method="post">
         <label>User Name: </label>
         <input type="text" name="user_name" required/>
         <label>Password: </label>
         <input type="password" name="pass_user" required/>
         <input type="submit" class="btn" name="login" value="login"/>
       </form>
       <div class="col-lg-6">
       </div>
       </div>
     </div>
     </div>

   <?php
         }
         // Update bad login count
       $data = $conn->prepare( 'UPDATE user_entries SET FailedLogin = (FailedLogin + 1) WHERE Name = (:user) LIMIT 1;' );
       $data->bindParam( ':user', $user, PDO::PARAM_STR );
       $data->execute();
    }
     else {
       // Login successful
       ?>
       <div class = "jumbotron jumbotron-fluid">
         <div class="container">
          <h1 align="center">Project Unknown Welcomes You</h1>
        </div>
       </div>
       <div class="container">
         <div class="row">
           <div class="col-lg-10">
       <?php
       echo "Login successful<br/>";
       echo "Welcome ".$_SESSION['user_name']." you have logged in !!<br/>";
       // Had the account been locked out since last login?
       if( $_SESSION['Flogin'] >= $_SESSION['TFlogin'] ) {
           echo "<p><em>Warning</em>: Brute Force may have been tried over you account.</p>";
           echo "<p>Number of login attempts: <em>".$_SESSION['Flogin']."</em>.<br />Last login attempt was at: <em>".$_SESSION['Llogin']."</em>.</p>";
       }
       // Reset bad login count
       $data = $conn->prepare( 'UPDATE user_entries SET FailedLogin = "0" WHERE Name = (:user) LIMIT 1;' );
       $data->bindParam( ':user', $user, PDO::PARAM_STR );
       $data->execute();
       ?>
     </div>
     <div class="col-lg-2">
       <form action="login_val.php" method="post">
         <input type="submit" class="btn" name ="logout" value="logout"/>
       </form>
     </div>
     </div>
     </div>
     <?php  }
