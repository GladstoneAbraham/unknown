<?php
  require "../config/db_init.php";
  $stmt = $conn->prepare("Insert into post(Name,Title,Content) values((:user),(:ptitle),(:pcontent))");
  $user = "sw1";
  $stmt->bindParam(':user',$user,PDO::PARAM_STR);
  $ptitle = "Lclasico";
  $stmt->bindParam(':ptitle', $ptitle,PDO::PARAM_STR);
  $content = "Barca";
  $stmt->bindParam(':pcontent',$content,PDO::PARAM_STR);
  $stmt->execute();
  echo "entry sucessfully added";
 ?>
