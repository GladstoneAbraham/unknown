<?php
require "db_init.php";

session_start();
$_SESSION['id'] = "-1";
function session_generate($user)
{
  $t = md5(md5("SW") + md5($user));
  return $t;
}

?>
