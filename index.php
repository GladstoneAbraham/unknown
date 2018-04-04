<?php
require '../main-layout/header.php';
if(!isset($_COOKIE['SSID']))
{
  header("Location:login/login.php");
}
else {
  header("Location:home/index.php");
}
 ?>
