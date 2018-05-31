<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "unknown";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  }
  catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
 ?>
