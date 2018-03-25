<?php
require "db_init.php";

session_start();
$_SESSION['lock'] = false;
$_SESSION['failed'] = false;
function session_generate()
{
  $cookie_value = sha1(mt_rand() . time() . md5("ProjectUnknown2018"));
  setcookie("SSID", $cookie_value, time()+3600, "/", $_SERVER['HTTP_HOST'], false, true);
}

?>
