<?php
  require "sessions.php";
  require "db_init.php";
  require "validate.php";
  header("Refresh:60");
 ?>
 <html>
   <head>
     <title>Project Secure Programmers</title>
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
    <form action="login_val.php" method="post">
      <label>User Name: </label>
      <input type="text" name="user_name" required/>
      <label>Password: </label>
      <input type="password" name="pass_user" required/>
      <input type="submit" name="login" value="login"/>
    </form>
<?php
      }
      // Update bad login count
    $data = $conn->prepare( 'UPDATE user_entries SET FailedLogin = (FailedLogin + 1) WHERE Name = (:user) LIMIT 1;' );
    $data->bindParam( ':user', $user, PDO::PARAM_STR );
    $data->execute();
 }
  else {

    // Login successful
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
    <form action="login_val.php" method="post">
      <input type="submit" name ="logout" value="logout"/>
    </form>


  <?php  }
  ?>
  </body>
</html>
