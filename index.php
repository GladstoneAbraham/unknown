<?php
  require "sessions.php";
  require "db_init.php";
  if(isset($_POST['login']))
  {
    //User Name Validation :)
    $user = $_POST['user_name'];
    $user = stripslashes( $user );
    $user = $conn->quote( $user );
    //Password Validation
    $pass = $_POST['pass_user'];
    $pass = stripslashes( $pass );
    $pass = $conn->quote( $pass );
    $pass = md5($pass);
    //prevent brute force
    $total_failed_login = 3;
    $lockout_time       = 1;
    $account_locked     = false;
    //verify user cred from db
    $data = $conn->prepare( 'SELECT FailedLogin, LastLogin FROM user_entries WHERE Name = (:user) LIMIT 1;' );
    $data->bindParam( ':user', $user, PDO::PARAM_STR );
    $data->execute();
    $row = $data->fetch();
    if( ( $data->rowCount() == 1 ) && ( $row[ 'FailedLogin' ] >= $total_failed_login ) )  {

        $last_login = strtotime( $row[ 'LastLogin' ] );
        $timeout    = $last_login + ($lockout_time * 60);
        $timenow    = time();

        if( $timenow < $timeout ) {
            $account_locked = true;

        }
    }
    $data = $conn->prepare( 'SELECT * FROM user_entries WHERE Name = (:user) AND Password = (:password) LIMIT 1;' );
    $data->bindParam( ':user', $user, PDO::PARAM_STR);
    $data->bindParam( ':password', $pass, PDO::PARAM_STR );
    $data->execute();
    $row = $data->fetch();
    if( ( $data->rowCount() == 1 ) && ( $account_locked == false ) ) {
        // Get users details
        $failed_login = $row[ 'FailedLogin' ];
        $last_login   = $row[ 'LastLogin' ];
        
        // Login successful
        echo "Login successful";
        echo "Welcome ".$user." you have logged in !!";

        // Had the account been locked out since last login?
        if( $failed_login >= $total_failed_login ) {
            echo "<p><em>Warning</em>: Brute Force may have been tried over you account.</p>";
            echo "<p>Number of login attempts: <em>{$failed_login}</em>.<br />Last login attempt was at: <em>${last_login}</em>.</p>";
        }

        // Reset bad login count
        $data = $conn->prepare( 'UPDATE user_entries SET FailedLogin = "0" WHERE Name = (:user) LIMIT 1;' );
        $data->bindParam( ':user', $user, PDO::PARAM_STR );
        $data->execute();
    } else {
        // Login failed
        sleep( rand( 2, 4 ) );

        // Give the user some feedback
        echo "<pre><br />Username and/or password incorrect.<br /><br/>Alternative, the account has been locked because of too many failed logins.<br />If this is the case, <em>please try again in {$lockout_time} minutes</em>.</pre>";

        // Update bad login count
        $data = $conn->prepare( 'UPDATE user_entries SET FailedLogin = (FailedLogin + 1) WHERE Name = (:user) LIMIT 1;' );
        $data->bindParam( ':user', $user, PDO::PARAM_STR );
        $data->execute();
    }

    // Set the last login time
    $data = $conn->prepare( 'UPDATE user_entries SET LastLogin = now() WHERE Name = (:user) LIMIT 1;' );
    $data->bindParam( ':user', $user, PDO::PARAM_STR );
    $data->execute();
  }
 ?>
<html>
  <head>
    <title>Project Secure Programmers</title>
  </head>
  <body>
    <form action="" method="post">
      <label>User Name: </label>
      <input type="text" name="user_name" required/>
      <label>Password: </label>
      <input type="password" name="pass_user" required/>
      <input type="submit" name="login" value="login"/>
    </form>
  </body>
</html>
