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
  <div class = "jumbotron jumbotron-fluid bg-dark text-light">
    <div class="container">
     <h1 align="center">Project Unknown Login Page</h1>
   </div>
  </div>
    <div class="container">
    <div class = "row">
    <div class = "col-lg-4">
    </div>
    <div class = "col-lg-4 form-group">
   <form class="form-control bg-dark" action="login_val.php" method="post">
     <label class="text-light">User Name: </label>
     <input class="form-control"type="text" name="user_name" required/>
     <label class="text-light" >Password: </label>
     <input class="form-control" type="password" name="pass_user" required/><br/>
     <input class="form-control" type="submit" class="btn" name="login" value="login"/>
   </form>
   </div>
   <div class="col-lg-4">
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
   <div class="container">
     <div class="row">
       <div class="col-lg-10">
   <?php
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
 <!--
 <div class="col-lg-2">
   <form action="login_val.php" method="post">
     <input type="submit" class="btn" name ="logout" value="logout"/>
   </form>
 </div>
-->
 </div>
 </div>
 <?php  }
 ?>
