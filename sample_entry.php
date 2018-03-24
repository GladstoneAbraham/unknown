<?php
  require "db_init.php";
  $stmt = $conn->prepare("Insert into user_entries(Name,Password,FailedLogin,LastLogin) values((:user),(:pass),(:flogin),now())");
  $user = "sw1";
  $stmt->bindParam(':user',$user,PDO::PARAM_STR);
  $pass = md5("1234");
  $stmt->bindParam(':pass', $pass,PDO::PARAM_STR);
  $val = 0;
  $stmt->bindParam('flogin',$val);
  $stmt->execute();
  echo "entry sucessfully added";
 ?>
