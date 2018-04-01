<?php
require "../config/db_init.php";
require "../config/sessions.php";
require "../login/validate.php";
if(isset($_POST['logout']))
{
  setcookie("SSID","",time()-3600,"/",$_SERVER['HTTP_HOST'],false,true);
  session_destroy();
  header('Location:../home/index.php');
}
if(isset($_POST['login']))
{
  //User Name Validation :)
  $user = $_POST['user_name'];
  $user = $val->username($user);
  $_SESSION['user_name'] = $user;
  //Password Validation

  $pass = $_POST['pass_user'];
  $pass = $val->password($pass);
  $_SESSION['password'] = $pass;

  //prevent brute force
  $total_failed_login = $_SESSION['TFlogin'];
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
          $_SESSION['lock'] = true;
      }
  }
  $data = $conn->prepare( 'SELECT * FROM user_entries WHERE Name = (:user) AND Password = (:password) LIMIT 1;' );
  $data->bindParam( ':user', $user, PDO::PARAM_STR);
  $data->bindParam( ':password', $pass, PDO::PARAM_STR );
  $data->execute();
  $row = $data->fetch();
  if( ( $data->rowCount() == 1 ) && ( $account_locked == false ) ) {
      //Session Creation
      session_generate();
      // Get users details
      $failed_login = $row[ 'FailedLogin' ];
      $last_login   = $row[ 'LastLogin' ];
      $_SESSION['Flogin'] = $failed_login;
      $_SESSION['Llogin'] = $last_login;
  } else {
      // Login failed
      sleep( rand( 2, 4 ) );
      $_SESSION['failed'] = true;
  }
  // Set the last login time
  $data = $conn->prepare( 'UPDATE user_entries SET LastLogin = now() WHERE Name = (:user) LIMIT 1;' );
  $data->bindParam( ':user', $user, PDO::PARAM_STR );
  $data->execute();
  header('Location:../home/index.php');
}
?>
