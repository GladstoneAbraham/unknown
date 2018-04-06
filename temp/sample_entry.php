<?php
  require "../config/db_init.php";
  $stmt = $conn->prepare("Insert into user_entries(Name,Password,FailedLogin,LastLogin) values((:user),(:pass),(:flogin),now())");
  $user = "sw";
  $stmt->bindParam(':user',$user,PDO::PARAM_STR);
  $pass = md5("123");
  $stmt->bindParam(':pass', $pass,PDO::PARAM_STR);
  $val = 0;
  $stmt->bindParam('flogin',$val);
  $stmt->execute();
  echo "entry sucessfully added";
 ?>
