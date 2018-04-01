<?php
  require "../login/validate.php";
  require "../config/sessions.php";
  require "../config/db_init.php";
  header("Refresh:60");
  error_reporting(0);
  ?>
  <html>
  <head>
    <title>Project Secure Programmers</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body class="bg-secondary">
    <?php
    if(isset($_COOKIE['SSID']))
      require "../home/navbar.php";
      ?>
