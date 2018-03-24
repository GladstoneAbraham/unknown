<?php
  require "sessions.php";
  require "db_init.php";
  require "validate.php";
  if(isset($_POST['login']))
  {

    //User Name Validation :)
    $user = $_POST['user_name'];
    $user = $val->username($user);
    //Password Validation

    $pass = $_POST['pass_user'];
    $pass = $val->password($pass);

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
        echo "Login successful<br/>";
        echo "Welcome ".$user." you have logged in !!<br/>";
        //Session Creation
        $_SESSION['id'] = session_generate($user);
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

        if($account_locked == true)
        {
        echo "<pre><br/>Your account has been locked because of too many failed logins.<br />If this is the case, <em>please try again in {$lockout_time} minutes</em>.</pre>";
      }
        else {
          echo "<pre><br />Username and/or password incorrect.<br /></pre>";
        }
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
 <?php
 if($_SESSION['id'] == "-1")
 {?>

    <form action="" method="post">
      <label>User Name: </label>
      <input type="text" name="user_name" required/>
      <label>Password: </label>
      <input type="password" name="pass_user" required/>
      <input type="submit" name="login" value="login"/>
    </form>
<?php
 }
  else {
    echo "else part";

    }
  ?>
  </body>
</html>
