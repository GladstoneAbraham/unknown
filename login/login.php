<?php
require "../main-layout/header.php";
if(!isset($_COOKIE['SSID']))
{
  if($_SESSION['lock']==true){
    echo "<pre><br/>Your account has been locked because of too many failed logins.<br />If this is the case, <em>please try again in {$lockout_time} minutes</em>.</pre>";
}
else
{
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
   <form class="form-control bg-dark" action="../login/login_val.php" method="post">
     <label class="text-light">User Name: </label>
     <input class="form-control"type="text" name="user_name" required/>
     <label class="text-light" >Password: </label>
     <input class="form-control" type="password" name="pass_user" required/><br/>
     <input class="form-control btn-light" type="submit" class="btn" name="login" value="login"/>
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
   header("Location:../home/index.php");
 }
 ?>
