<?php
/**
 *
 */
class Validate
{

  function __construct()
  {
    # code...
  }
  function username($user)
  {
    $user = stripslashes( $user );
    $user =  mysql_real_escape_string( $user );
    return $user;
  }
  function password($pass)
  {
    $pass = stripslashes( $pass );
    $pass = mysql_real_escape_string( $pass );
    $pass = md5( $pass );
    return $pass;
  }
}

$val = new Validate;

 ?>
