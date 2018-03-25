<?php
  require "validate.php";
  require "sessions.php";
  require "db_init.php";
  header("Refresh:60");
  ?>
  <html>
  <head>
    <title>Project Secure Programmers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php
    require "sub_header.php";
    ?>
